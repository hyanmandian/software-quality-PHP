<?php namespace App\Calculators;

use App\Calculators\Calculator;
use App\People\Person;
use ReflectionClass;
use App\Calculators\IMC;
use App\Person\Men;
use App\Calculators\CalculatorAvaliation;

class TGC implements Calculator, CalculatorAvaliation
{
    private $dictionary = [
        'women' => [
            [
                'min' => 0,
                'max' => 30,
                'tgc' => [
                    [
                        'min' => 0,
                        'max' => 16,
                        'avaliation' => 'Ideal',
                    ],
                    [
                        'min' => 16,
                        'max' => 18,
                        'avaliation' => 'Aceitável',
                    ],
                ],
            ],
            [
                'min' => 30,
                'max' => 39,
                'tgc' => [
                    [
                        'min' => 0,
                        'max' => 18,
                        'avaliation' => 'Ideal',
                    ],
                    [
                        'min' => 18,
                        'max' => 20,
                        'avaliation' => 'Aceitável',
                    ],
                ],
            ],
            [
                'min' => 39,
                'max' => 49,
                'tgc' => [
                    [
                        'min' => 0,
                        'max' => 18.5,
                        'avaliation' => 'Ideal',
                    ],
                    [
                        'min' => 18.5,
                        'max' => 25,
                        'avaliation' => 'Aceitável',
                    ],
                ],
            ],
            [
                'min' => 49,
                'max' => 59,
                'tgc' => [
                    [
                        'min' => 0,
                        'max' => 21.5,
                        'avaliation' => 'Ideal',
                    ],
                    [
                        'min' => 21.5,
                        'max' => 26.5,
                        'avaliation' => 'Aceitável',
                    ],
                ],
            ],
            [
                'min' => 59,
                'max' => 99999999999999,
                'tgc' => [
                    [
                        'min' => 0,
                        'max' => 22.5,
                        'avaliation' => 'Ideal',
                    ],
                    [
                        'min' => 22.5,
                        'max' => 27.5,
                        'avaliation' => 'Aceitável',
                    ],
                ],
            ],
        ],
        'men' => [
            [
                'min' => 0,
                'max' => 30,
                'tgc' => [
                    [
                        'min' => 0,
                        'max' => 9,
                        'avaliation' => 'Ideal',
                    ],
                    [
                        'min' => 9,
                        'max' => 13,
                        'avaliation' => 'Aceitável',
                    ],
                ],
            ],
            [
                'min' => 30,
                'max' => 39,
                'tgc' => [
                    [
                        'min' => 0,
                        'max' => 12.5,
                        'avaliation' => 'Ideal',
                    ],
                    [
                        'min' => 12.5,
                        'max' => 16.5,
                        'avaliation' => 'Aceitável',
                    ],
                ],
            ],
            [
                'min' => 39,
                'max' => 49,
                'tgc' => [
                    [
                        'min' => 0,
                        'max' => 15,
                        'avaliation' => 'Ideal',
                    ],
                    [
                        'min' => 15,
                        'max' => 19,
                        'avaliation' => 'Aceitável',
                    ],
                ],
            ],
            [
                'min' => 49,
                'max' => 59,
                'tgc' => [
                    [
                        'min' => 0,
                        'max' => 16.5,
                        'avaliation' => 'Ideal',
                    ],
                    [
                        'min' => 16.5,
                        'max' => 20.5,
                        'avaliation' => 'Aceitável',
                    ],
                ],
            ],
            [
                'min' => 59,
                'max' => 99999999999999,
                'tgc' => [
                    [
                        'min' => 0,
                        'max' => 16.5,
                        'avaliation' => 'Ideal',
                    ],
                    [
                        'min' => 16.5,
                        'max' => 20.5,
                        'avaliation' => 'Aceitável',
                    ],
                ],
            ],
        ]
    ];
    
    private function calculateTGC($person) {
        $imc = new IMC();
        $imc = $imc->calculate($person);
        
        $refletionClass = new ReflectionClass($person);
        $genre = strtolower($refletionClass->getShortName());
        
        $s = $genre === 'men' ? 1 : 0;
        
        $age = $person->getAge();
        
        $tgc = (1.2 * $imc) - (10.8 * $s) + (0.23 * $age) - 5.4;
        
        $tgc = number_format($tgc, 2, '.', ' ');
        
        $values = $this->dictionary[$genre];
        
        foreach($values as $value) {
            if($age >= $value['min'] && $age < $value['max']) {
                foreach($value['tgc'] as $tgcValue) {
                    if($tgc <= $tgcValue['min']) {
                        return [
                            'value' => $tgc,
                            'avaliation' => $tgcValue['avaliation'],
                        ];
                    } elseif($tgc > $tgcValue['min'] && $tgc <= $tgcValue['max']) {
                        return [
                            'value' => $tgc,
                            'avaliation' => $tgcValue['avaliation'],
                        ];
                    }
                }
            }
        }
    }
    
    public function calculate(Person $person)
    {
        return $this->calculateTGC($person)['value'] . "%";
    }
    
    public function calculateAvaliation(Person $person)
    {
        return $this->calculateTGC($person)['avaliation'];
    }
}