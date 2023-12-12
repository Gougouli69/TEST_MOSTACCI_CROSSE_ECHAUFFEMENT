<?php

namespace App\Classes\Languages;

use App\Classes\Moment\MomentInterface;
use Exception;

class EnglishLanguage implements LanguageInterface {
    
    private $langCode = 'en_US';
    private $sentences = [];

    public function __construct()
    {
        $this->loadDictionnary();
    }

    public function congrats(): string 
    {
        return $this->getTranslation('CONGRATS');
    }

    public function hello(MomentInterface $moment): string
    {
        return $this->getTranslation($moment::HIWORD);
    }
    
    public function goodbye(MomentInterface $moment): string
    {
        return $this->getTranslation($moment::BYEWORD);
    }

    private function getTranslation(string $code): string 
    {
        return $this->sentences[$code];
    }

    protected function loadDictionnary() {
        if(empty($this->langCode))
            throw new Exception("Property langCode not defined");
        $json = file_get_contents(__DIR__ . '/../../../translate/' . $this->langCode . '.json');
        $this->sentences = json_decode($json, true);
    }


}