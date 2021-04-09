<?php

namespace App\Service;

class Math
{
    public array $resultDivs = [];

    function generateDivisors($curIndex, $curDivisor, $primeFactorization, $upDiv)
    {
        if ($curIndex == count($primeFactorization)) {
            if ($curDivisor <= $upDiv)
                $this->resultDivs[] = $curDivisor;
            return;
        }
        for ($i = 0; $i <= $primeFactorization[$curIndex][0]; ++$i) {
            $this->generateDivisors($curIndex + 1, $curDivisor, $primeFactorization, $upDiv);
            $curDivisor *= $primeFactorization[$curIndex][1];
        }
    }

    function findDivisors($n, $upDiv): array
    {
        $this->resultDivs = [];
        $primeFactorization = $this->findPrimeDivisors($n);
        $facts = [];

        foreach (array_count_values($primeFactorization) as $key => $value) {
            $facts[] = [
                $value, $key
            ];
        }

        $curIndex = 0;
        $curDivisor = 1;
        $this->generateDivisors($curIndex, $curDivisor, $facts, $upDiv);

        return $this->resultDivs;
    }

    function findPrimeDivisors(int $number): array
    {
        $primeDivisors = [];
        while ($number % 2 == 0) {
            $primeDivisors[] = 2;
            $number = $number >> 1;
        }

        for ($i = 3; $i <= sqrt($number); $i += 2) {
            while ($number % $i == 0) {
                $primeDivisors[] = $i;
                $number = $number / $i;
            }
        }

        if ($number > 2) {
            $primeDivisors[] = $number;
        }

        return $primeDivisors;
    }

    function isPrime(int $number): bool
    {
        if ($number == 2) {
            return true;
        }

        if ($this->isEven($number) || $number == 1) {
            return false;
        }

        $counter = 3;
        while ($counter * $counter <= $number) {
            if ($number % $counter == 0) {
                return false;
            } else {
                $counter += 2;
            }
        }

        return true;
    }

    function isEven(int $number): bool
    {
        if ($number == 1) {
            return false;
        }

        return $number % 2 == 0;
    }

    function isTriangular(int $number): bool
    {
        if ($number < 0)
            return false;

        // Considering the equation
        // n*(n+1)/2 = num
        // The equation is :
        // a(n^2) + bn + c = 0";
        $c = (-2 * $number);
        $b = 1;
        $a = 1;
        $d = ($b * $b) - (4 * $a * $c);

        if ($d < 0)
            return false;

        // Find roots of equation
        $root1 = (-$b + (float)sqrt($d)) / (2 * $a);

        $root2 = (-$b - (float)sqrt($d)) / (2 * $a);

        // checking if root1 is natural
        if ($root1 > 0 && floor($root1) == $root1)
            return true;

        // checking if root2 is natural
        if ($root2 > 0 && floor($root2) == $root2) {
            return true;
        }

        return false;
    }

}