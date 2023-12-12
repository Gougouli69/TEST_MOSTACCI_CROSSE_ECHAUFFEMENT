<?php

use Tests\Utilities\VerificatorPalindromeBuilder;
use PHPUnit\Framework\TestCase;
use App\Classes\Moment\MomentInterface;
use App\Classes\Moment\MorningMoment;
use Tests\Classes\LanguageFake;

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
    public function testPalindrome(string $text) 
    {
        $language = new LanguageFake;
        $verificateur = (new VerificatorPalindromeBuilder())->havingLanguage($language)->build();
        $result = $verificateur->getThePalindrome($text);
        $expect = $text . " ". $language->congrats();

        $this->assertStringContainsString($expect, $result);
    }


    /**
     * @dataProvider providerDynamic
     */
    public function testPalindromePrefixedByHiWord(string $string) 
    {
        $language = new LanguageFake;
        $verificateur = (new VerificatorPalindromeBuilder())->havingLanguage($language)->build();
        $result = $verificateur->getThePalindrome($string);

        $this->assertEquals($language->hello(new MorningMoment), explode("\n\r", $result)[0]);
    }

    /**
     * @dataProvider providerDynamic
     */
    public function testPalindromeSuffixedByByeWord(string $string) 
    {
        $language = new LanguageFake;
        $verificateur = (new VerificatorPalindromeBuilder())->havingLanguage($language)->build();
        $result = $verificateur->getThePalindrome($string);

        $explodedString = explode("\n\r", $result);

        $this->assertEquals($language->goodbye(new MorningMoment), $explodedString[sizeof($explodedString)-1]);
    }

    /**
     * @dataProvider providerTimeDay
     */
    public function testPalindromePrefixChoseByTime(string $string, MomentInterface $moment) 
    {
        $language = new LanguageFake;
        $verificateur = (new VerificatorPalindromeBuilder())
            ->havingLanguage($language)
            ->havingMoment($moment)
            ->build();
        $result = $verificateur->getThePalindrome($string);

        $explodedString = explode("\n\r", $result);

        $this->assertEquals($language->hello($moment), $explodedString[0]);
    }

    public function providerTimeDay(){
        return [
            ['test', new MorningMoment],
            ['ynov', new MorningMoment],
        ];
    }

    public function providerDynamic(){
        $words = ['test', 'ynov'];

        foreach($words as $word) {
            yield [$word];
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
            ['kayak'],
            ['radar'],
        ];
    }

}