<?php namespace App;

use App\Student;
use App\Calculators\Calculator;

class Bulletin
{
    private $student;
    private $scores = [];
    private $calculator;
    
    public function __construct(Student $student, Calculator $calculator) 
    {
        $this->student = $student;
        $this->calculator = $calculator;
    }
    
    public function addScore($score) 
    {
        $this->scores[] = $score;   
    }
    
    public function getScore() 
    {
        return $this->calculator->calculate($this->scores);
    }
}