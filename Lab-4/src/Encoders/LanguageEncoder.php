<?php namespace App\Encoders;

use App\Encoders\Encoder;

class LanguageEncoder implements Encoder
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
    
    private function isWordSeparator($letter)
    {
        return $letter === $this->separator;
    }
    
    private function isLetterSeparator($letter) {
        return strlen($letter) && $letter !== $this->separator;
    }
    
    private function getSeparator($previousLetter, $currentLetter)
    {
        if($this->isWordSeparator($currentLetter))
            return $this->wordSeparator;

        if($this->isLetterSeparator($previousLetter))
            return $this->letterSeparator;
    }
    
    private function getLastChar($str)
    {
        return substr($str, -1);
    }
    
    private function parseStr($str) {
        return array_map("strtolower", str_split($str));
    }
    
    private function convertLetters($carry, $currentLetter)
    {
        $previousLetter = $this->getLastChar($carry);
        
        $carry.= $this->getSeparator($previousLetter, $currentLetter);

        if(in_array($currentLetter, array_flip($this->letters))) {
            $carry.= $this->letters[$currentLetter];
        }

        return $carry;
    }
    
    public function encode($str)
    {
        return array_reduce($this->parseStr($str), [$this, "convertLetters"]);
    }
}