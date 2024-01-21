<?php

use Tests\Utilities\VerificatorPalindromeBuilder;
use Domain\Classes\Moment\MomentInterface;
use Domain\Classes\Moment\MorningMoment;
use Tests\Classes\LanguageFake;

test('not palindrome', function (string $text) {
    $verificateur = (new VerificatorPalindromeBuilder())->default();
    $result = $verificateur->getThePalindrome($text);
    $expect = strrev($text);

    $this->assertStringContainsString($expect, $result);
})->with(
    [
        ['test'],
        ['ynov'],
    ]
);

test('palindrome', function (string $text) {
    $language = new LanguageFake;
    $verificateur = (new VerificatorPalindromeBuilder())->havingLanguage($language)->build();
    $result = $verificateur->getThePalindrome($text);
    $expect = $text . " ". $language->congrats();

    $this->assertStringContainsString($expect, $result);
})->with(
    [
        ['kayak'],
        ['radar'],
    ]
);

test('palindrome prefixed by hi word', function (string $string) {
    $language = new LanguageFake;
    $verificateur = (new VerificatorPalindromeBuilder())->havingLanguage($language)->build();
    $result = $verificateur->getThePalindrome($string);

    expect(explode("\n\r", $result)[0])->toEqual($language->hello(new MorningMoment));
})->with(
    [
        ['kayak'],
        ['ynov'],
    ]
);

test('palindrome suffixed by bye word', function (string $string) {
    $language = new LanguageFake;
    $verificateur = (new VerificatorPalindromeBuilder())->havingLanguage($language)->build();
    $result = $verificateur->getThePalindrome($string);

    $explodedString = explode("\n\r", $result);

    expect($explodedString[sizeof($explodedString)-1])->toEqual($language->goodbye(new MorningMoment));
})->with(
    [
        ['kayak'],
        ['ynov'],
    ]
);

test('palindrome prefix chose by time', function (string $string, MomentInterface $moment) {
    $language = new LanguageFake;
    $verificateur = (new VerificatorPalindromeBuilder())
        ->havingLanguage($language)
        ->havingMoment($moment)
        ->build();
    $result = $verificateur->getThePalindrome($string);

    $explodedString = explode("\n\r", $result);

    expect($explodedString[0])->toEqual($language->hello($moment));
})->with(
    [
        ['test', new MorningMoment],
        ['ynov', new MorningMoment],
    ]
);
