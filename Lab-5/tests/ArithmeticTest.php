<?php namespace TestNamespace;

use PHPUnit_Framework_TestCase;
use App\Calculators\Arithmetic;

class ArithmeticTest extends PHPUnit_Framework_TestCase
{
    private $calculator;
    
    protected function setUp()
    {
        $this->calculator = new Arithmetic();
    }
    
    /**
     * @test
     */
    public function should8WhenAvgOf8And8And8()
    {
        $this->assertEquals(8, $this->calculator->calculate([8, 8, 8]));
    }
}