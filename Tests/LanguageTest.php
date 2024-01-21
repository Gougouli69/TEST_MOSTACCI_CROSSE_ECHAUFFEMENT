<?php

use Domain\Classes\Languages\FrenchLanguage;
use Domain\Classes\Languages\EnglishLanguage;
use Domain\Classes\Moment\EveningMoment;
use Domain\Classes\Moment\MorningMoment;

test('language hello', function ($language, $text, $moment) {
    expect($text)->toEqual($language->hello($moment));
})->with([
    [new FrenchLanguage, 'Bonjour', new MorningMoment],
    [new EnglishLanguage, 'Hello', new MorningMoment],
    [new FrenchLanguage, 'Bonsoir', new EveningMoment],
    [new EnglishLanguage, 'Good Evening', new EveningMoment],
]);

test('language goodbye', function ($language, $text, $moment) {
    expect($text)->toEqual($language->goodbye($moment));
})->with([
    [new FrenchLanguage, 'Aurevoir', new MorningMoment],
    [new EnglishLanguage, 'Good bye', new MorningMoment],
    [new FrenchLanguage, 'Bonne soirée', new EveningMoment],
    [new EnglishLanguage, 'Good Evening', new EveningMoment]
]);
