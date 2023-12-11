<?php

use App\Classes\VerificatorPalindrome;
use PHPUnit\Framework\TestCase;
use App\Classes\Expressions;

class PalindromeTest extends TestCase {

    /**
     * @dataProvider providerNotPalindrome
     */
    public function testNotPalindrome(string $text) 
    {
        $result = VerificatorPalindrome::getThePalindrome($text);
        $expect = strrev($text);
        
        $this->assertStringContainsString($expect, $result);
    }

    /**
     * @dataProvider providerPalindrome
     */
    public function testPalindrome(string $text) 
    {
        $result = VerificatorPalindrome::getThePalindrome($text);
        $expect = $text . " ". Expressions::BIEN_DIT;

        $this->assertStringContainsString($expect, $result);
    }


    /**
     * @dataProvider allProviders
     */
    public function testPalindromePrefixedByHiWord(string $string) 
    {
        $result = VerificatorPalindrome::getThePalindrome($string);

        $this->assertEquals(Expressions::BONJOUR, explode("\n\r", $result)[0]);
    }

    /**
     * @dataProvider allProviders
     */
    public function testPalindromeSuffixedByByeWord(string $string) 
    {
        $result = VerificatorPalindrome::getThePalindrome($string);

        $explodedString = explode("\n\r", $result);

        $this->assertEquals(Expressions::AUREVOIR, $explodedString[sizeof($explodedString)-1]);
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