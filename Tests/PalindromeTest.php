<?php

use Tests\Utilities\VerificatorPalindromeBuilder;
use PHPUnit\Framework\TestCase;
use App\Classes\Expressions;
use App\Classes\Languages\EnglishLanguage;
use App\Classes\Languages\FrenchLanguage;
use App\Classes\Languages\LanguageInterface;

class PalindromeTest extends TestCase {

    /**
     * @dataProvider providerNotPalindrome
     */
    public function testNotPalindrome(string $text) 
    {
        $verificateur = (new VerificatorPalindromeBuilder())->default();
        $result = $verificateur->getThePalindrome($text);
        $expect = strrev($text);
        
        $this->assertStringContainsString($expect, $result);
    }

    /**
     * @dataProvider providerPalindrome
     */
    public function testPalindrome(string $text, LanguageInterface $language) 
    {
        $verificateur = (new VerificatorPalindromeBuilder())->havingLanguage($language)->build();
        $result = $verificateur->getThePalindrome($text);
        $expect = $text . " ". $language->congrats();

        $this->assertStringContainsString($expect, $result);
    }


    /**
     * @name gerg
     * @dataProvider providerPrefix
     */
    public function testPalindromePrefixedByHiWord(string $string, LanguageInterface $language) 
    {
        $verificateur = (new VerificatorPalindromeBuilder())->havingLanguage($language)->build();
        $result = $verificateur->getThePalindrome($string);

        $this->assertEquals($language->hello(), explode("\n\r", $result)[0]);
    }

    /**
     * @dataProvider providerSuffix
     */
    public function testPalindromeSuffixedByByeWord(string $string, LanguageInterface $language) 
    {
        $verificateur = (new VerificatorPalindromeBuilder())->havingLanguage($language)->build();
        $result = $verificateur->getThePalindrome($string);

        $explodedString = explode("\n\r", $result);

        $this->assertEquals($language->goodbye(), $explodedString[sizeof($explodedString)-1]);
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
            ['kayak', new FrenchLanguage],
            ['radar', new EnglishLanguage],
        ];
    }

    public function providerPrefix()
    {
        return [
            ['kayak', new FrenchLanguage],
            ['radar', new EnglishLanguage],
        ];
    }

    public function providerSuffix()
    {
        return [
            ['kayak', new FrenchLanguage],
            ['radar', new EnglishLanguage],
        ];
    }
}