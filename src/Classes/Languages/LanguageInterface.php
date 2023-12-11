<?php

namespace App\Classes\Languages;

interface LanguageInterface {

    public function congrats(): string;
    public function hello(): string;
    public function goodbye(): string;

}