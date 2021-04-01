<?php
    
namespace App\Problems\SpecialPythagoreanTriplet;

use App\BaseProblem;

class Problem extends BaseProblem
{
        
    function execute()
    {
        $num = 1000;
        for ($first = 1; $first <= $num / 3; $first++) {
            for ($second = $first + 1; $second <= $num / 2; $second++) {
                $third = $num - $first - $second;
                // a^2 + b^2 = c^2?
                if ($first * $first + $second * $second == $third * $third) {
                    $this->resultValue = $first * $second * $third;
                    return;
                }
            }
        }
    }
    
}
