<?php namespace App;

use App\Languages\Language;

class Translator
{
    private $language;
    
    public function __construct(Language $language)
    {
        $this->language = $language;
    }
    
    private function getCorrectEncodeSeparator($previousLetter, $currentLetter)
    {
        if($currentLetter === $this->language->getSeparator())
            return $this->language->getWordSeparator();

        if(strlen($previousLetter) && $previousLetter !== $this->language->getSeparator())
            return $this->language->getLetterSeparator();
    }
    
    public function encode($str)
    {
        $letters = array_map("strtolower", str_split($str));
        
        return array_reduce($letters, function ($carry, $currentLetter) {
            $previousLetter = substr($carry, -1);
            
            $carry.= $this->getCorrectEncodeSeparator($previousLetter, $currentLetter);
            
            $encodedLetter = $this->language->getLetters()[$currentLetter];
            
            if(isset($encodedLetter)) {
                $carry.= $encodedLetter;
            }
            
            return $carry;
        });
    }
    
    public function decode($str)
    {
        $words = explode($this->language->getWordSeparator(), $str);
        
        return array_reduce($words, function ($carry, $word) {
            $letters = explode($this->language->getLetterSeparator(), $word);
            
            $decodedWord = array_reduce($letters, function ($carry, $letter) {
                $decodedLetter = array_search($letter, $this->language->getLetters());
                
                $carry.= $decodedLetter === FALSE ? null : $decodedLetter;
                
                return $carry;
            });
            
            $carry.= strlen($carry) ? $this->language->getSeparator() : null . $decodedWord;
            
            return $carry;
        });
    }
}