<?php namespace App\Languages;

interface Language {
    public function getTokens();
    public function getSeparator();
    public function getLetterSeparator();
    public function getWordSeparator();
}