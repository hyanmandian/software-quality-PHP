<?php namespace App\Calculators;

use App\Calculators\Calculator;

class Weighted implements Calculator 
{
    public function calculate($scores) {
        $totalScores = array_reduce($scores, function($acc, $score) {
            return $acc + $score[0];
        }, 0);
        
        $totalWeightedScores = array_reduce($scores, function($acc, $score) {
            return $acc + ($score[0] * $score[1]);
        }, 0);
        
        return $totalWeightedScores / $totalScores;
    }
}
