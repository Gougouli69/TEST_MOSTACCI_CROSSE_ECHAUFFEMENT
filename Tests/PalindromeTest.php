<?php

use App\Classes\VerificatorPalindrome;
use PHPUnit\Framework\TestCase;

class PalindromeTest extends TestCase {

    /**
     * @dataProvider providerNotPalindrome
     */
    public function testNotPalindrome($text) 
    {
        $result = VerificatorPalindrome::getThePalindrome($text);
        $expect = strrev($text);
        
        $this->assertStringContainsString($expect, $result);
    }

    /**
     * @dataProvider providerPalindrome
     */
    public function testPalindrome($text) 
    {
        $result = VerificatorPalindrome::getThePalindrome($text);
        $expect = $text . " Bien dit";

        $this->assertStringContainsString($expect, $result);
    }


    /**
     * @dataProvider allProviders
     */
    public function testPalindromePrefixedByBonjour($string) 
    {
        $result = VerificatorPalindrome::getThePalindrome($string);

        $this->assertStringContainsString("Bonjour", explode("\n\r", $result)[0]);
    }

    /**
     * @dataProvider allProviders
     */
    public function testPalindromeSuffixedByBonjour($string) 
    {
        $result = VerificatorPalindrome::getThePalindrome($string);

        $explodedString = explode("\n\r", $result);

        $this->assertStringContainsString("Bonsoir", $explodedString[sizeof($explodedString)-1]);
    }


    public function providerNotPalindrome()
    {
        return [
            ['test'],
            ['ynov'],
        ];
    }


    public function providerPalindrome()
    {
        return [
            ['kayak'],
            ['radar'],
        ];
    }

    public function allProviders()
    {
        return array_merge(
            $this->providerNotPalindrome(),
            $this->providerPalindrome()
        );
    }
}