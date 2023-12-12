<?php

namespace Tests\Classes;

use App\Classes\Languages\LanguageInterface;
use App\Classes\Moment\MomentInterface;

class LanguageStub implements LanguageInterface {
    
    public function congrats(): string 
    {
        return '';
    }

    public function hello(MomentInterface $moment): string 
    {
        return '';
    }

    public function goodbye(MomentInterface $moment): string 
    {
        return '';
    }
}