<?php
    
namespace App\Problems\MultiplesOfThreeAndFive;

use App\BaseProblem;

class Problem extends BaseProblem
{
        
    function execute()
    {
        for ($i = 3; $i < 1000; $i++) {
            if ($i % 3 == 0 || $i % 5 == 0) {
                $this->resultValue += $i;
            }
        }
    }
    
}
