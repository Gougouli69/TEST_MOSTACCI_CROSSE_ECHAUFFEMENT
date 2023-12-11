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
     * @dataProvider providerDynamic
     */
    public function testPalindromePrefixedByHiWord(string $string, LanguageInterface $language) 
    {
        $verificateur = (new VerificatorPalindromeBuilder())->havingLanguage($language)->build();
        $result = $verificateur->getThePalindrome($string);

        $this->assertEquals($language->hello(), explode("\n\r", $result)[0]);
    }

    /**
     * @dataProvider providerDynamic
     */
    public function testPalindromeSuffixedByByeWord(string $string, LanguageInterface $language) 
    {
        $verificateur = (new VerificatorPalindromeBuilder())->havingLanguage($language)->build();
        $result = $verificateur->getThePalindrome($string);

        $explodedString = explode("\n\r", $result);

        $this->assertEquals($language->goodbye(), $explodedString[sizeof($explodedString)-1]);
    }

    public function providerDynamic(){
        $languages = [new FrenchLanguage, new EnglishLanguage];
        $words = ['test', 'ynov'];

        foreach($languages as $language) {
            foreach($words as $word) {
                yield [$word, $language];
            }        
        }
    }

    private function providerNotPalindrome()
    {
        return [
            ['test'],
            ['ynov'],
        ];
    }


    private function providerPalindrome()
    {
        return [
            ['kayak', new FrenchLanguage],
            ['radar', new EnglishLanguage],
        ];
    }

}