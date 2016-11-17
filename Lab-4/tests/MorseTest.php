<?php namespace TestNamespace;

use PHPUnit_Framework_TestCase;
use App\Translator;
use App\Languages\Morse;

class MorseTest extends PHPUnit_Framework_TestCase
{
    private $translator;
    
    protected function setUp()
    {
        $this->translator = new Translator(new Morse());
    }
    
    /**
     * @test
     */
    public function encode()
    {
        $expect = ".- -... -.-. -.. . ..-. --. .... .. .--- -.- .-.. -- -. --- .--. --.- .-. ... - ..- ...- .-- -..- -.-- --..   .---- ..--- ...-- ....- ..... -.... --... ---.. ----. -----";
        $actual = $this->translator->encode("abcdefghijklmnopqrstuvwxyz 1234567890");
    
        $this->assertTrue(stripos($expect, $actual) !== FALSE);
    }
    
    /**
     * @test
     */
    public function decode()
    {
        $expect = "abcdefghijklmnopqrstuvwxyz 1234567890";
        $actual = $this->translator->decode(".- -... -.-. -.. . ..-. --. .... .. .--- -.- .-.. -- -. --- .--. --.- .-. ... - ..- ...- .-- -..- -.-- --..   .---- ..--- ...-- ....- ..... -.... --... ---.. ----. -----");
    
        $this->assertTrue(stripos($expect, $actual) !== FALSE);
    }
}