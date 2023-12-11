<?php

namespace App\Classes\Languages;

use Exception;

class EnglishLanguage implements LanguageInterface {
    
    private $langCode = 'en_US';
    private $sentences = [];

    public function __construct()
    {
        $this->langCode = 'en_US';
        $this->loadDictionnary();
    }

    public function congrats(): string 
    {
        return $this->getTranslation('CONGRATS');
    }

    public function hello(): string
    {
        return $this->getTranslation('BONJOUR');
    }
    
    public function goodbye(): string
    {
        return $this->getTranslation('AUREVOIR');
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