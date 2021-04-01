<?php
    
namespace App\Problems\LargestPrimeFactor;

use App\BaseProblem;

class Problem extends BaseProblem
{

    function execute(int $number = 600851475143)
    {
        if ($number % 2 !== 0 && $this->math->isPrime($number)) {
            echo $number;
            exit();
        } else {
            for ($i = 3; $i < $number; $i++) {
                if ($number % $i == 0) {
                    $this->execute($number / $i);
                }
            }
        }
    }
    
}
