<?php namespace App\Decoders;

use App\Decoders\Decoder;

class LanguageDecoder implements Decoder
{
    private $letters;
    private $separator;
    private $wordSeparator;
    private $letterSeparator;
    
    public function __construct($letters, $separator, $wordSeparator, $letterSeparator)
    {
        $this->letters = $letters;
        $this->separator = $separator;
        $this->wordSeparator = $wordSeparator;
        $this->letterSeparator = $letterSeparator;
    }
    
    private function parseStr($str, $separator)
    {
        return explode($separator, $str);
    }

    private function parseLetters($str) 
    {
        return $this->parseStr($str, $this->letterSeparator);
    }
    
    private function parseWords($str) 
    {
        return $this->parseStr($str, $this->wordSeparator);
    }
    
    private function convertLetters($carry, $letter)
    {
        if(in_array($letter, $this->letters)) {
            $carry.= array_search($letter, $this->letters);
        }
        
        return $carry;
    }
    
    private function convertWords($carry, $word)
    {
        $letters = $this->parseLetters($word);
            
        $word = array_reduce($letters, [$this, "convertLetters"]);
        
        $carry.= strlen($carry) ? $this->separator : null . $word;
        
        return $carry;
    }
    
    public function decode($str)
    {
        return array_reduce($this->parseWords($str), [$this, "convertWords"]);
    }
}