<?php

require_once "vendor/autoload.php";

use App\Classes\TimePalindrome;

$dateNow = new DateTime(date("H:i:s"));
$timePalindrome = new TimePalindrome();

// Say hi-word in console at the begging 
$timePalindrome->sayInConsole(
    $timePalindrome->getHiMessageDependingOnDayMoment($dateNow)
);

// Mirror the input user as long as the input is not empty
while ($userInput = readline("Saisissez votre texte (vide pour quitter): ")) {
    $timePalindrome->sayInConsole($userInput);

    // Comment if it's a Palindrome
    $isAPalindrome = $timePalindrome->textIsAPalindrome($userInput);
    if($isAPalindrome)
        $timePalindrome->isAPalindromeSuccessText($isAPalindrome);
} 

// Say bye-word at the end
$timePalindrome->sayInConsole(
    $timePalindrome->getByeMessageDependingOnDayMoment($dateNow)
);
