<?php namespace App\Languages;

interface Language {
    public function getLetters();
    public function getSeparator();
    public function getLetterSeparator();
    public function getWordSeparator();
}