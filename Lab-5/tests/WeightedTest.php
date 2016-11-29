<?php namespace TestNamespace;

use PHPUnit_Framework_TestCase;
use App\Calculators\Weighted;

class WeightedTest extends PHPUnit_Framework_TestCase
{
    private $calculator;
    
    protected function setUp()
    {
        $this->calculator = new Weighted();
    }
    
    /**
     * @test
     */
    public function should2WhenWeight2AndScores8And8And8()
    {
        $scores = [
            [8,2],
            [8,2],
            [8,2],
        ];
        
        $this->assertEquals(2, $this->calculator->calculate($scores));
    }
}