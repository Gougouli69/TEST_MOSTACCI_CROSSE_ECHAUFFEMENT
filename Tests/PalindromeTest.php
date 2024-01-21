<?php

use Domain\Classes\Languages\EnglishLanguage;
use Domain\Classes\Languages\FrenchLanguage;
use Domain\Classes\Languages\LanguageInterface;
use Domain\Classes\Moment\EveningMoment;
use Tests\Utilities\VerificatorPalindromeBuilder;
use Domain\Classes\Moment\MomentInterface;
use Domain\Classes\Moment\MorningMoment;
use Domain\Classes\Moment\NightMoment;
use Tests\Classes\LanguageFake;
use Tests\Classes\UnknownLanguage;

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

    expect(trim($explodedString[sizeof($explodedString)-1]))->toEqual($language->goodbye(new MorningMoment));
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

test('palindrome, anglais, soir', function(string $string, LanguageInterface $languageInterface, MomentInterface $momentInterface) {

    $verificateur = (new VerificatorPalindromeBuilder())
    ->havingLanguage($languageInterface)
    ->havingMoment($momentInterface)
    ->build();

    $result = $verificateur->getThePalindrome($string);

    $mirror = strrev($string);
    expect($result)->toEqual($languageInterface->hello($momentInterface) . "\n\r" . $mirror . " " .  $languageInterface->congrats() . "\n\r" . $languageInterface->goodbye($momentInterface) . "\n");

})->with(
    [
        ['kayak', new EnglishLanguage, new EveningMoment],
    ]
);

test('Non-palindrome, français, matin', function(string $string, LanguageInterface $languageInterface, MomentInterface $momentInterface) {

    $verificateur = (new VerificatorPalindromeBuilder())
    ->havingLanguage($languageInterface)
    ->havingMoment($momentInterface)
    ->build();

    $result = $verificateur->getThePalindrome($string);

    $mirror = strrev($string);
    expect($result)->toEqual($languageInterface->hello($momentInterface) . "\n\r" . $mirror . "\n\r" . $languageInterface->goodbye($momentInterface) . "\n");

})->with(
    [
        ['forp tseb erdnaS oznE', new FrenchLanguage, new MorningMoment],
    ]
);

test('Palindrome, inconnue, nuit', function(string $string, LanguageInterface $languageInterface, MomentInterface $momentInterface) {

    $verificateur = (new VerificatorPalindromeBuilder())
    ->havingLanguage($languageInterface)
    ->havingMoment($momentInterface)
    ->build();

    $result = $verificateur->getThePalindrome($string);

    $mirror = strrev($string);
    expect($result)->toEqual("\n\r" . $mirror . "\n\r" . "\n");

})->with(
    [
        ['Ressasser', new UnknownLanguage, new NightMoment],
    ]
);