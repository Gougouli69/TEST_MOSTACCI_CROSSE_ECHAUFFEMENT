<?php

namespace Tests;

use App\Classes\Languages\EnglishLanguage;
use App\Classes\Languages\FrenchLanguage;
use PHPUnit\Framework\TestCase;

class LanguageTest extends TestCase{

    /**
     * @dataProvider providerLanguage
     */
    public function testLanguage($language, $text) {
        $this->assertEquals($language->hello(), $text);
    }

    public function providerLanguage(){
        return [
            [new FrenchLanguage, 'Bonjour'],
            [new EnglishLanguage, 'Hello']
        ];
    }

}