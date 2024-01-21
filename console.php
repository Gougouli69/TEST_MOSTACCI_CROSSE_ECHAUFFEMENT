<?php

require_once "vendor/autoload.php";


use Domain\Classes\Languages\FrenchLanguage;
use Domain\Classes\Moment\MorningMoment;
use Domain\Classes\VerificatorPalindrome;
use Infra\Adapter\Time\TimeMomentAdapter;
use Infra\Repository\Computer\Time\TimeComputer;


$timeInterface = new TimeComputer;
$time = $timeInterface->getTime();
var_dump($time);

$timeMomentAdapter = new TimeMomentAdapter();
$moment = $timeMomentAdapter->getMomentFromTime($time);

$language = new FrenchLanguage();
$moment = new MorningMoment();

$verificateur = new VerificatorPalindrome($language, $moment);

echo $verificateur->getThePalindrome('Kayak');
