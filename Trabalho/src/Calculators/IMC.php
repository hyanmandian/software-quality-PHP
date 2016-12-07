<?php namespace App\Calculators;

use App\Calculators\Calculator;
use App\Calculators\CalculatorAvaliation;
use App\People\Person;
use ReflectionClass;

class IMC implements Calculator, CalculatorAvaliation
{
    private $dictionary = [
        'women' => [
            [
                'min' => 0,
                'max' => 19.1,
                'avaliation' => 'Abaixo do peso',
            ],
            [
                'min' => 19.1,
                'max' => 25.8,
                'avaliation' => 'Ideal',
            ],
            [
                'min' => 25.8,
                'max' => 9999999999999999999,
                'avaliation' => 'Obeso',
            ],
        ],
        'men' => [
            [
                'min' => 0,
                'max' => 20.7,
                'avaliation' => 'Abaixo do peso',
            ],
            [
                'min' => 20.7,
                'max' => 26.4,
                'avaliation' => 'Ideal',
            ],
            [
                'min' => 26.4,
                'max' => 9999999999999999999,
                'avaliation' => 'Obeso',
            ],
        ]
    ];

    private function calculateIMC(Person $person)
    {
        $imc = $person->getWeight() / pow($person->getHeight(), 2);
        $imc = number_format($imc, 2, '.', ' ');
        
        $refletionClass = new ReflectionClass($person);
        $values = $this->dictionary[strtolower($refletionClass->getShortName())];
        
        foreach($values as $value) {
            if($imc >= $value['min'] && $imc < $value['max']) {
                return [
                    'value' => $imc,
                    'avaliation' => $value['avaliation'],
                ];
            }
        }
    }

    public function calculate(Person $person)
    {
        return $this->calculateIMC($person)['value'];
    }
    
    public function calculateAvaliation(Person $person) {
        return $this->calculateIMC($person)['avaliation'];
    }
}