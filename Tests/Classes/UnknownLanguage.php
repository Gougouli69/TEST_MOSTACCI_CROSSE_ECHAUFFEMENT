<?php

namespace Tests\Classes;

use Domain\Classes\Languages\LanguageInterface;
use Domain\Classes\Moment\MomentInterface;

class UnknownLanguage implements LanguageInterface {
    
    public function congrats(): string {
        return '';
    }
    
    public function hello(MomentInterface $moment): string {
        return '';
    }
    
    public function goodbye(MomentInterface $moment): string {
        return '';
    }
    


}