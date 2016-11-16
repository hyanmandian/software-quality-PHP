<?php namespace TestNamespace;

use PHPUnit_Framework_TestCase;
use App\Morse;

class TestCaseClass extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function encode()
    {
        $morse = new Morse();
        
        $expect = ".- -... -.-. -.. . ..-. --. .... .. .--- -.- .-.. -- -. --- .--. --.- .-. ... - ..- ...- .-- -..- -.-- --..   .---- ..--- ...-- ....- ..... -.... --... ---.. ----. -----";
        $actual = $morse->encode("ABCDEFGHIJKLMNOPQRSTUVWXYZ 1234567890");
    
        $this->assertEquals($expect, $actual);
    }
    
    /**
     * @test
     */
    public function decode()
    {
        $morse = new Morse();
        
        $expect = "ABCDEFGHIJKLMNOPQRSTUVWXYZ 1234567890";
        $actual = $morse->decode(".- -... -.-. -.. . ..-. --. .... .. .--- -.- .-.. -- -. --- .--. --.- .-. ... - ..- ...- .-- -..- -.-- --..   .---- ..--- ...-- ....- ..... -.... --... ---.. ----. -----");
    
        $this->assertTrue(stripos($expect, $actual) !== FALSE);
    }
}