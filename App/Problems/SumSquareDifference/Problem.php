<?php
    
namespace App\Problems\SumSquareDifference;

use App\BaseProblem;

class Problem extends BaseProblem
{
        
    function execute()
    {
        $hundredSum = 0;
        $sumSquares = 0;
        $i = 1;
        while ($i <= 100) {
            $hundredSum += $i;
            $sumSquares += $i * $i;
            $i++;
        }

        $squareSum = $hundredSum * $hundredSum;
        $this->resultValue = $squareSum - $sumSquares;
    }
    
}
