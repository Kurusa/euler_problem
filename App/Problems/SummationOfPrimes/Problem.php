<?php

namespace App\Problems\SummationOfPrimes;

use App\BaseProblem;

class Problem extends BaseProblem
{

    function execute()
    {
        for ($i = 1; $i < 2_000_000; $i++) {
            if ($this->math->isPrime($i)) {
                $this->resultValue += $i;
            }
        }
    }

}
