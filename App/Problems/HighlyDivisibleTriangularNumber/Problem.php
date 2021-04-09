<?php

namespace App\Problems\HighlyDivisibleTriangularNumber;

use App\BaseProblem;

class Problem extends BaseProblem
{

    function execute()
    {
        $found = false;
        $i = 0;
        while (!$found) {
            if ($this->math->isTriangular($i)) {
                echo $i . "\n";
                if (count($this->math->findDivisors($i, $i)) > 500) {
                    $this->resultValue = $i;
                    $found = true;
                }
            }
            $i += 2;
        }
    }

}
