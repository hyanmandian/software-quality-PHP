<?php namespace App\Languages;

class Leet implements Language 
{
    public function getLetters() 
    {
        return [
            "a" => "@",
            "b" => "|:",
            "c" => "[.",
            "d" => "I>",
            "e" => "&",
            "f" => "Ph",
            "g" => "C-",
            "h" => "#",
            "i" => "!",
            "j" => "(/",
            "k" => "X",
            "l" => "1_",
            "m" => "IVI",
            "n" => "/V",
            "o" => "()",
            "p" => "|*",
            "q" => "(_,)",
            "r" => "12",
            "s" => "$",
            "t" => "+",
            "u" => "|_|",
            "v" => "\/",
            "w" => "VV",
            "x" => ")(",
            "y" => "`/",
            "z" => "%",
        ];
    }
    
    public function getSeparator()
    {
        return " ";
    }
    
    public function getLetterSeparator() 
    {
        return str_repeat($this->getSeparator(), 1);
    }
    
    public function getWordSeparator() 
    {
        return str_repeat($this->getSeparator(), 4);
    }
}