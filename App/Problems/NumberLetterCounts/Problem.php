<?php
    
namespace App\Problems\NumberLetterCounts;

use App\BaseProblem;

class Problem extends BaseProblem
{
        
    function execute()
    {
        $count = 1;
        $charsCount = 0;
        while ($count <= 1000) {
            $convertedWord = $this->convertNumberToWord($count);
            $word = str_replace(' ', '', $convertedWord);
            $charsCount += strlen($word);
            $count++;
        }

        $this->resultValue = $charsCount;
    }

    function convertNumberToWord(int $num): string
    {
        if ($num == 1000) {
            return 'one thousand';
        }
        $words = [];
        $level1 = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
        $level2 = ['', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred'];
        $level3 = ['', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion'];

        // 8: 1+2/3 = 1
        // 800: 3+2/3 = 1.6 = 1
        // 1000: 4+2/3 = 2
        $levels = (int)((strlen($num) + 2) / 3);

        // 8: 1*3 = 3
        // 800: 1*3 = 3
        // 1000: 2*3 = 6
        $maxLength = $levels * 3;

        // 008
        // 011
        $num = substr('00' . $num, -$maxLength);

        $levels--;
        $hundreds = (int)($num / 100);
        if ($hundreds) {
            $hundreds = $level1[$hundreds] . ' hundred';
        } else {
            $hundreds = '';
        }

        $tens = (int)($num % 100);
        $singles = '';
        if ($tens < 20) {
            if ($tens) {
                $tens = ($hundreds ? ' and ' : '') . $level1[$tens];
            } else {
                $tens = '';
            }
        } else {
            $tens = (int)($tens / 10);
            $tens = ($hundreds ? 'and' : '') . $level2[$tens] . ' ';
            $singles = (int)($num % 10);
            $singles = $level1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . (($levels && ( int )($num)) ? ' ' . $level3[$levels] . ' ' : '');
        return implode(' ', $words);
    }

}
