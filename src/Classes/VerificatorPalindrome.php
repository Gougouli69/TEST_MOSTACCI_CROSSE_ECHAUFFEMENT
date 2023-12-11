<?php

namespace App\Classes;

class VerificatorPalindrome {

    public static function getThePalindrome(string $string): string {

        $mirror = strrev($string);

        if($mirror == $string) 
            return "Bonjour\n\r" . $mirror . " Bien dit" . "\n\rBonsoir";

        return "Bonjour\n\r" . $mirror . "\n\rBonsoir";
    }
}