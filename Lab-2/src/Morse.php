<?php namespace App;

use ArrayObject;

class Morse 
{
    const SPACE = " ";
    
    private $letterSpace;
    private $wordSpace;
    
    private $dictionary = [
        "a" => ".-",
        "b" => "-...",
        "c" => "-.-.",
        "d" => "-..",
        "e" => ".",
        "f" => "..-.",
        "g" => "--.",
        "h" => "....",
        "i" => "..",
        "j" => ".---",
        "k" => "-.-",
        "l" => ".-..",
        "m" => "--",
        "n" => "-.",
        "o" => "---",
        "p" => ".--.",
        "q" => "--.-",
        "r" => ".-.",
        "s" => "...",
        "t" => "-",
        "u" => "..-",
        "v" => "...-",
        "w" => ".--",
        "x" => "-..-",
        "y" => "-.--",
        "z" => "--..",
        
        "1" => ".----",
        "2" => "..---",
        "3" => "...--",
        "4" => "....-",
        "5" => ".....",
        "6" => "-....",
        "7" => "--...",
        "8" => "---..",
        "9" => "----.",
        "0" => "-----",
    ];
    
    public function __construct() {
        $this->letterSpaceSize = 1;
        $this->wordSpaceSize = 3;
    }
    
    private function generateSpaces($quantity)
    {
        return str_repeat(self::SPACE, $quantity);
    }
    
    public function encode($str) 
    {
        return array_reduce(str_split($str), function ($carry, $token) {
            $token = strtolower($token);
            
            $convertedToken = "";
            
            if($token === self::SPACE) {
                $convertedToken.= $this->generateSpaces($this->wordSpaceSize);
            } elseif(strlen($carry) && substr($carry, -1) !== self::SPACE) {
                $convertedToken.= $this->generateSpaces($this->letterSpaceSize);
            }
            
            $convertedToken.= isset($this->dictionary[$token]) ? $this->dictionary[$token] : "";
            
            return $carry . $convertedToken;
        });
    }
    
    public function decode($str)
    {
        $words = explode($this->generateSpaces($this->wordSpaceSize), $str);
        
        return array_reduce($words, function ($carry, $token) {
            $letters = explode($this->generateSpaces($this->letterSpaceSize), $token);
            
            $token = array_reduce($letters, function ($carry, $token) {
                $token = array_search($token, $this->dictionary) === FALSE ? "" : array_search($token, $this->dictionary);
                return $carry . $token;
            });
            
            return $carry . (strlen($carry) ? " " : "") . $token;
        });
    }
}