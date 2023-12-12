<?php

namespace Tests;

use App\Classes\Languages\EnglishLanguage;
use App\Classes\Languages\FrenchLanguage;
use App\Classes\Moment\DefaultMoment;
use App\Classes\Moment\EveningMoment;
use App\Classes\Moment\MorningMoment;
use PHPUnit\Framework\TestCase;

class LanguageTest extends TestCase {

    /**
     * @dataProvider providerLanguageHello
     */
    public function testLanguageHello($language, $text, $moment) {
        $this->assertEquals($language->hello($moment), $text);
    }

        /**
     * @dataProvider providerLanguageGoodBye
     */
    public function testLanguageGoodbye($language, $text, $moment) {
        $this->assertEquals($language->goodbye($moment), $text);
    }

    public function providerLanguageHello(){
        return [
            [new FrenchLanguage, 'Bonjour', new MorningMoment],
            [new EnglishLanguage, 'Hello', new MorningMoment],
            [new FrenchLanguage, 'Bonsoir', new EveningMoment],
            [new EnglishLanguage, 'Good Evening', new EveningMoment],
        ];
    }

    public function providerLanguageGoodBye(){
        return [
            [new FrenchLanguage, 'Aurevoir', new MorningMoment],
            [new EnglishLanguage, 'Good bye', new MorningMoment],
            [new FrenchLanguage, 'Bonsoir', new EveningMoment],
            [new EnglishLanguage, 'Good Evening', new EveningMoment]
        ];
    }

}