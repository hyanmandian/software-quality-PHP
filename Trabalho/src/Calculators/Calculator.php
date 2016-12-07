<?php namespace App\Calculators;

use App\People\Person;

interface Calculator
{
    public function calculate(Person $person);
}