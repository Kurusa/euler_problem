<?php

namespace App\Service;

class Math
{
    public $resultDivs = [];

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

    function findDivisors($n, $upDiv)
    {
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

    function findPrimeDivisors($number): array
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

    function isPrime($number): bool
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


    function primeCheck($number): int
    {
        if ($number == 1)
            return 0;
        for ($i = 2; $i <= $number / 2; $i++) {
            if ($number % $i == 0)
                return 0;
        }
        return 1;
    }


    function isEven($number): bool
    {
        if ($number == 1) {
            return false;
        }
        return $number % 2 == 0;
    }

}