<?php namespace App;

use App\Languages\Language;

class Translator
{
    private $language;
    
    public function __construct(Language $language)
    {
        $this->language = $language;
    }
    
    public function encode($str)
    {
        $letters = array_map("strtolower", str_split($str));
        
        return array_reduce($letters, function ($carry, $letter) {
            $encodedLetter = "";
            
            if($letter === $this->language->getSeparator()) {
                $encodedLetter.= $this->language->getWordSeparator();
            } elseif(strlen($carry) && substr($carry, -1) !== $this->language->getSeparator()) {
                $encodedLetter.= $this->language->getLetterSeparator();
            }
            
            $token = $this->language->getTokens()[$letter];
            
            $carry.= $encodedLetter;
            
            if(isset($token)) {
                $carry.= $token;
            }
            
            return $carry;
        });
    }
    
    public function decode($str)
    {
        $words = explode($this->language->getWordSeparator(), $str);
        
        return array_reduce($words, function ($carry, $word) {
            $letters = explode($this->language->getLetterSeparator(), $word);
            
            $token = array_reduce($letters, function ($carry, $letter) {
                $decodedLetter = array_search($letter, $this->language->getTokens());
                $carry.= $decodedLetter === FALSE ? "" : $decodedLetter;
                
                return $carry;
            });
            
            $carry.= (strlen($carry) ? " " : "") . $token;
            
            return $carry;
        });
    }
}