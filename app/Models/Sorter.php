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

}
