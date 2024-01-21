<?php

namespace Domain\Classes;

use Domain\Classes\Languages\LanguageInterface;
use Domain\Classes\Moment\MomentInterface;

class VerificatorPalindrome {

    public function __construct(
        private LanguageInterface $language,
        private MomentInterface $moment,
    )
    {}

    public function getThePalindrome(string $string): string {

        $mirror = strrev($string);

        if($mirror == $string) 
            return $this->language->hello($this->moment) . "\n\r" . $mirror . " " .  $this->language->congrats() . "\n\r" . $this->language->goodbye($this->moment) . "\n";

        return $this->language->hello($this->moment) . "\n\r" . $mirror . "\n\r" . $this->language->goodbye($this->moment). "\n";
    }

}