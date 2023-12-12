<?php

namespace Tests\Classes;

use App\Classes\Languages\LanguageInterface;
use App\Classes\Moment\MomentInterface;
use Exception;

class LanguageFake implements LanguageInterface {
    
    private $langCode = 'fke_FKE';
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
            throw new Exception("Property langCode isnot defined");
        $json = file_get_contents(__DIR__ . '/../../translate/' . $this->langCode . '.json');
        $this->sentences = json_decode($json, true);
    }


}