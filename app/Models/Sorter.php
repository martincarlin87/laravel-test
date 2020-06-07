<?php

namespace App\Models;

class Sorter
{

    private $numbers;

    public function __construct(array $numbers)
    {
        $this->numbers = $numbers;
    }

    public function numericSort(): array
    {
        sort($this->numbers, SORT_NUMERIC);

        return $this->numbers;
    }

    public function insertionSort(): array
    {

        for ($i = 0; $i <= count($this->numbers) - 2; $i++) {

            $k = $i;

            for ($j = $i + 1; $j > 0; $j--) {

                if ($this->numbers[$j] < $this->numbers[$k]) {
                    $temp = $this->numbers[$j];
                    $this->numbers[$j] = $this->numbers[$k];
                    $this->numbers[$k] = $temp;
                }

                if ($k > 0) {
                    $k--;
                }
            }
        }

        return $this->numbers;
    }

    public function powerSort(): array
    {
        usort($this->numbers, function ($a, $b) {
            // base numbers are the array key and exponents the value
            // first check if the exponent is larger
            list($baseA, $exponentA) = $a;
            list($baseB, $exponentB) = $b;

            return pow($baseA, $exponentA) <=> pow($baseB, $exponentB);
        });

        return $this->numbers;
    }

}
