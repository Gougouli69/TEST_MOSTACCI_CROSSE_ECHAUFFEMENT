<?php

namespace App\Classes;

use App\Classes\Languages\LanguageInterface;

class VerificatorPalindrome {

    public function __construct(
        private LanguageInterface $language
    )
    {}

    public function getThePalindrome(string $string): string {

        $mirror = strrev($string);

        if($mirror == $string) 
            return $this->language->hello() . "\n\r" . $mirror . " " .  $this->language->congrats() . "\n\r" . $this->language->goodbye();

        return $this->language->hello() . "\n\r" . $mirror . "\n\r" . $this->language->goodbye();
    }

}