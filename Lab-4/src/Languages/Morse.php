<?php namespace App\Languages;

class Morse implements Language 
{
    public function getLetters() 
    {
        return [
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
        return str_repeat($this->getSeparator(), 3);
    }
}