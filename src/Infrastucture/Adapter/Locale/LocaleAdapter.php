<?php

namespace Infra\Adapter\Locale;

use Domain\Classes\Languages\EnglishLanguage;
use Domain\Classes\Languages\FrenchLanguage;
use Domain\Classes\Languages\LanguageInterface;

class LocaleAdapter {

    public static $FRENCH_LANGUAGE = 'French';
    public static $ENGLISH_LANGUAGE = 'English';
    

    public function getLanguageFromLocale(string $locale): LanguageInterface
    {
        if ($locale === self::$FRENCH_LANGUAGE) 
            return new FrenchLanguage();
        
        if ($locale === self::$ENGLISH_LANGUAGE) 
            return new EnglishLanguage();
        
        //Default language
        return new EnglishLanguage();
    }

}