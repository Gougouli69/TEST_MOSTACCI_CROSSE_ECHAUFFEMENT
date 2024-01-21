<?php

require_once "vendor/autoload.php";


use Domain\Classes\Languages\FrenchLanguage;
use Domain\Classes\Moment\MorningMoment;
use Domain\Classes\VerificatorPalindrome;
use Infra\Adapter\Locale\LocaleAdapter;
use Infra\Adapter\Time\TimeMomentAdapter;
use Infra\Repository\Computer\Locale\LocaleComputer;
use Infra\Repository\Computer\Time\TimeComputer;

while($value = readline("Saisissez votre palindrome à tester (q to quit): \n")) {
    if($value === 'q')
        break; 
    
    $timeInterface = new TimeComputer;
    $time = $timeInterface->getTime();
    
    $localeInterface = new LocaleComputer;
    $locale = $localeInterface->getLocale();
    
    
    $timeMomentAdapter = new TimeMomentAdapter();
    $moment = $timeMomentAdapter->getMomentFromTime($time);
    
    
    $localeAdapter = new LocaleAdapter();
    $language = $localeAdapter->getLanguageFromLocale($locale);
    
    
    $verificateur = new VerificatorPalindrome($language, $moment);

    echo $verificateur->getThePalindrome($value);

}


