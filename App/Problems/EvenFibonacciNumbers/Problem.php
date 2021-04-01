<?php
    
namespace App\Problems\EvenFibonacciNumbers;

use App\BaseProblem;

class Problem extends BaseProblem
{
        
    function execute()
    {
        $fib1 = $fib2 = 1;
        $summed = 0;

        while ($summed < 4_000_000) {
            if ($summed % 2 == 0) {
                $this->resultValue += $summed;
            }
            $summed = $fib1+$fib2;
            $fib2 = $fib1;
            $fib1 = $summed;
        }
    }
    
}
