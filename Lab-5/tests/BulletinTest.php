<?php namespace TestNamespace;

use PHPUnit_Framework_TestCase;
use App\Bulletin;
use App\Student;
use App\Calculators\Arithmetic;
use App\Calculators\Weighted;

class BulletinTest extends PHPUnit_Framework_TestCase
{
    private $bulletinArithmetic;
    private $bulletinWeighted;
    
    protected function setUp()
    {
        $this->bulletinArithmetic = new Bulletin(new Student(), new Arithmetic());
        $this->bulletinWeighted = new Bulletin(new Student(), new Weighted());
    }
    
    
    /**
     * @test
     */
     public function bulletinArithmeticGetScoreTest(){
         $this->bulletinArithmetic->addScore(7);
         $this->bulletinArithmetic->addScore(7);
         $this->bulletinArithmetic->addScore(7);
         
         $this->assertEquals(7, $this->bulletinArithmetic->getScore());
     }
     
     /**
     * @test
     */
     public function bulletinWeightedGetScoreTest(){
         $this->bulletinWeighted->addScore([8, 2]);
         $this->bulletinWeighted->addScore([8, 2]);
         $this->bulletinWeighted->addScore([8, 2]);
         
         $this->assertEquals(2, $this->bulletinWeighted->getScore());
     }
}