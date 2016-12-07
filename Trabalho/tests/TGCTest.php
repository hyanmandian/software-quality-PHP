<?php namespace TestNamespace;

use PHPUnit_Framework_TestCase;
use App\Calculators\TGC;
use App\People\Men;
use App\People\Women;

class TGCTest extends PHPUnit_Framework_TestCase
{
    private $calculator;
    
    protected function setUp()
    {
        $this->calculator = new TGC();
    }
    
    /**
     * @test
     */
    public function avaliationMenTest()
    {
        $person = new Men(1.80, 60, 30);
        $this->assertEquals('Aceitável', $this->calculator->calculateAvaliation($person));
    }
    
    /**
     * @test
     */
    public function valueMenTest()
    {
        $person = new Men(1.80, 60, 30);
        $this->assertEquals("12.92%", $this->calculator->calculate($person));
    }
    
    
    /**
     * @test
     */
    public function avaliationWomenTestTest()
    {
        $person = new Women(1.65, 40, 20);
        $this->assertEquals('Aceitável', $this->calculator->calculateAvaliation($person));
    }
    
    /**
     * @test
     */
    public function valueWomenTestTest()
    {
        $person = new Women(1.65, 40, 20);
        $this->assertEquals("16.83%", $this->calculator->calculate($person));
    }
}