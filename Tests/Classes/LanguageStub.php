<?php

use App\Classes\Languages\LanguageInterface;

class LanguageStub implements LanguageInterface {
    
    public function congrats(): string 
    {
        return '';
    }

    public function hello(): string 
    {
        return '';
    }

    public function goodbye(): string 
    {
        return '';
    }
}