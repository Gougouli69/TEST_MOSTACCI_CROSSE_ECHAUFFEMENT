<?php

namespace Tests\Utilities;

use App\Classes\Languages\FrenchLanguage;
use App\Classes\Languages\LanguageInterface;
use App\Classes\VerificatorPalindrome;
use LanguageStub;

class VerificatorPalindromeBuilder {

    private LanguageInterface $language;

    public function __construct()
    {
        $this->language = new LanguageStub();
    }

    public function default()
    {
        return (new VerificatorPalindromeBuilder())->build();
    }

    public function build() 
    {
        return new VerificatorPalindrome($this->language);
    }

    public function havingLanguage($language): VerificatorPalindromeBuilder
    {
        $this->language = $language;
        return $this;
    }

}