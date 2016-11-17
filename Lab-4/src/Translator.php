<?php namespace App;

use App\Languages\Language;
use App\Encoders\LanguageEncoder;
use App\Decoders\LanguageDecoder;

class Translator
{
    private $language;
    private $encoder;
    private $decoder;
    
    public function __construct(Language $language)
    {
        $this->language = $language;
        
        $letters = $this->language->getLetters();
        $separator = $this->language->getSeparator();
        $wordSeparator = $this->language->getWordSeparator();
        $letterSeparator = $this->language->getLetterSeparator();
        
        $this->encoder = new LanguageEncoder($letters, $separator, $wordSeparator, $letterSeparator);
        $this->decoder = new LanguageDecoder($letters, $separator, $wordSeparator, $letterSeparator);
    }
    
    public function encode($str)
    {
        return $this->encoder->encode($str);
    }
    
    public function decode($str)
    {
        return $this->decoder->decode($str);
    }
}