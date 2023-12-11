<?php


main();


function sayInConsole(string $string, $endOfLIne = TimePalindrome::BACKTONEXTLINE) {
    echo $string . $endOfLIne;
}

function main() {
    $dateNow = new DateTime(date("H:i:s"));
    $timePalindrome = new TimePalindrome();

    $hiMessage = $timePalindrome->getHiMessageDependingOnDayMoment($dateNow);
    sayInConsole($hiMessage);
    while ($userInput = readline("Saisissez votre texte (vide pour quitter): ")) {
        sayInConsole($userInput);
    
        if($timePalindrome->textIsAPalindrome($userInput))
            sayInConsole(TimePalindrome::ISAPALINDROMESUCCESSTEXT);
    } 

    $byeMessage = $timePalindrome->getByeMessageDependingOnDayMoment($dateNow);
    sayInConsole($byeMessage);
}
