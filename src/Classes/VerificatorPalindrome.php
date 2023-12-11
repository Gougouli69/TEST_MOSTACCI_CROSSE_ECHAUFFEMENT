<?php

namespace App\Classes;

use App\Classes\Expressions;

class VerificatorPalindrome {

    public static function getThePalindrome(string $string): string {

        $mirror = strrev($string);

        if($mirror == $string) 
            return Expressions::BONJOUR . "\n\r" . $mirror . " " .  Expressions::BIEN_DIT . "\n\r" . Expressions::AUREVOIR;

        return Expressions::BONJOUR . "\n\r" . $mirror . "\n\r" . Expressions::AUREVOIR;
    }
}