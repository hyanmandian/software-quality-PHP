<?php namespace TestNamespace;

use PHPUnit_Framework_TestCase;
use App\Translator;
use App\Languages\Leet;

class LeetTest extends PHPUnit_Framework_TestCase
{
    private $translator;
    
    protected function setUp()
    {
        $this->translator = new Translator(new Leet());
    }
    
    /**
     * @test
     */
    public function encode()
    {
        $expect = "@ |: [. I> & Ph C- # ! (/ X 1_ IVI /V () |* (_,) 12 $ + |_| \/ VV )( `/ %";
        $actual = $this->translator->encode("abcdefghijklmnopqrstuvwxyz");
    
        $this->assertTrue(stripos($expect, $actual) !== FALSE);
    }
    
    /**
     * @test
     */
    public function decode()
    {
        $expect = "abcdefghijklmnopqrstuvwxyz";
        $actual = $this->translator->decode("@ |: [. I> & Ph C- # ! (/ X 1_ IVI /V () |* (_,) 12 $ + |_| \/ VV )( `/ %");
    
        $this->assertTrue(stripos($expect, $actual) !== FALSE);
    }
}