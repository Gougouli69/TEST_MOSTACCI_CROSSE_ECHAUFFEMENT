<?php

namespace App\Classes;

use App\Classes\Languages\LanguageInterface;
use App\Classes\Moment\MomentInterface;

class VerificatorPalindrome {

    public function __construct(
        private LanguageInterface $language,
        private MomentInterface $moment,
    )
    {}

    public function getThePalindrome(string $string): string {

        $mirror = strrev($string);

        if($mirror == $string) 
            return $this->language->hello($this->moment) . "\n\r" . $mirror . " " .  $this->language->congrats() . "\n\r" . $this->language->goodbye($this->moment);

        return $this->language->hello($this->moment) . "\n\r" . $mirror . "\n\r" . $this->language->goodbye($this->moment);
    }

}