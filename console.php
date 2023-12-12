<?php

use App\Classes\Languages\FrenchLanguage;
use App\Classes\Moment\MorningMoment;
use App\Classes\VerificatorPalindrome;

require_once "vendor/autoload.php";

$language = new FrenchLanguage();
$moment = new MorningMoment();

$verificateur = new VerificatorPalindrome($language, $moment);

echo $verificateur->getThePalindrome('Kayak');