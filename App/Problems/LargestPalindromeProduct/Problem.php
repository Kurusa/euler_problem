<?php
    
namespace App\Problems\LargestPalindromeProduct;

use App\BaseProblem;

class Problem extends BaseProblem
{
        
    function execute()
    {
        $firstHalf = 998;
        while (!$this->resultValue) {
            $firstHalf--;
            $palindrome = $this->makePalindrome($firstHalf);
            for ($i = 999; $i > 99; $i--) {
                if (($palindrome / $i) > 999 || $i * $i < $palindrome) {
                    break;
                }
                if (($palindrome % $i == 0)) {
                    $this->resultValue = $palindrome;
                    break;
                }
            }
        }
    }

    function makePalindrome($firstHalf): string
    {
        $secondHalf = implode('', array_reverse(array_map('intval', str_split($firstHalf))));
        return (int)$firstHalf . $secondHalf;
    }

}
