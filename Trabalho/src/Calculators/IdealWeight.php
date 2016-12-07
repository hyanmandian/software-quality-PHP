<?php namespace App\Calculators;

use App\Calculators\Calculator;
use App\People\Person;
use ReflectionClass;

class IdealWeight implements Calculator
{
    public function calculate(Person $person)
    {
        $height = $person->getHeight() * 100;
        $refletionClass = new ReflectionClass($person);
        $genre = strtolower($refletionClass->getShortName());
        $k = $genre === 'men' ? 4 : 2;
        
        return abs(($height - 100) - (($height - 150) / $k));
    }
}