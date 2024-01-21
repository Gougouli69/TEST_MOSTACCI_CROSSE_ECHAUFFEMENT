<?php

namespace Tests\Utilities;

use Domain\Classes\Languages\LanguageInterface;
use Domain\Classes\Moment\MomentInterface;
use Domain\Classes\Moment\MorningMoment;
use Domain\Classes\VerificatorPalindrome;
use Tests\Classes\LanguageStub;

class VerificatorPalindromeBuilder {

    private LanguageInterface $language;
    private MomentInterface $moment;

    public function __construct()
    {
        $this->language = new LanguageStub();
        $this->moment = new MorningMoment;
    }

    public function default()
    {
        return (new VerificatorPalindromeBuilder())->build();
    }

    public function build() 
    {
        return new VerificatorPalindrome($this->language, $this->moment);
    }

    public function havingLanguage(LanguageInterface $language): VerificatorPalindromeBuilder
    {
        $this->language = $language;
        return $this;
    }

    public function havingMoment(MomentInterface $moment): VerificatorPalindromeBuilder
    {
        $this->moment = $moment;
        return $this;
    }

}