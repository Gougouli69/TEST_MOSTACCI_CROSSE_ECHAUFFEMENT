<?php

namespace Tests\Utilities;

use App\Classes\Languages\LanguageInterface;
use App\Classes\Moment\MomentInterface;
use App\Classes\Moment\MorningMoment;
use App\Classes\VerificatorPalindrome;
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