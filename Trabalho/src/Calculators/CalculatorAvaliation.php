<?php namespace App\Calculators;

use App\People\Person;

interface CalculatorAvaliation
{
    public function calculateAvaliation(Person $person);
}