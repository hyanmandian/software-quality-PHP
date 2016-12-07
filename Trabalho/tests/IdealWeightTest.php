<?php namespace TestNamespace;

use PHPUnit_Framework_TestCase;
use App\Calculators\IdealWeight;
use App\People\Men;
use App\People\Women;

class IdealWeightTest extends PHPUnit_Framework_TestCase
{
    private $calculator;
    
    protected function setUp()
    {
        $this->calculator = new IdealWeight();
    }
    
    /**
     * @test
     */
    public function valueMen()
    {
        $person = new Men(1.80, 60, 30);
        $this->assertEquals(72.5, $this->calculator->calculate($person));
    }
    
    
    /**
     * @test
     */
    public function valueWomen()
    {
        $person = new Women(1.65, 40, 20);
        $this->assertEquals(57.5, $this->calculator->calculate($person));
    }
}