<?php namespace TestNamespace;

use PHPUnit_Framework_TestCase;
use App\Calculators\IMC;
use App\People\Men;
use App\People\Women;

class IMCTest extends PHPUnit_Framework_TestCase
{
    private $calculator;
    
    protected function setUp()
    {
        $this->calculator = new IMC();
    }
    
    /**
     * @test
     */
    public function avaliationMen()
    {
        $person = new Men(1.80, 60);
        $this->assertEquals('Abaixo do peso', $this->calculator->calculateAvaliation($person));
    }
    
    
    /**
     * @test
     */
    public function avaliationWomen()
    {
        $person = new Women(1.65, 40);
        $this->assertEquals('Abaixo do peso', $this->calculator->calculateAvaliation($person));
    }
    
    /**
     * @test
     */
    public function valueMen()
    {
        $person = new Men(1.80, 60);
        $this->assertEquals(18.52, $this->calculator->calculate($person));
    }
    
    
    /**
     * @test
     */
    public function valueWomen()
    {
        $person = new Women(1.65, 40);
        $this->assertEquals(14.69, $this->calculator->calculate($person));
    }
}