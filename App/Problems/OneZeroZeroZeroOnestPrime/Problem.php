<?php
    
namespace App\Problems\OneZeroZeroZeroOnestPrime;

use App\BaseProblem;

class Problem extends BaseProblem
{
        
    function execute()
    {
        $primeCount = 1;
        $i = 1;
        while ($i > 0) {
            if ($this->math->isPrime($i)) {
                $primeCount++;
                if ($primeCount == 10_001) {
                    $this->resultValue = $i;
                    break;
                }
            }
            $i += 2;
        }
    }
    
}
