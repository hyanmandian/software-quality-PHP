<?php namespace App\Calculators;

use App\Calculators\Calculator;

class Arithmetic implements Calculator 
{
    public function calculate($scores) {
        return array_sum($scores) / count($scores);
    }
}
