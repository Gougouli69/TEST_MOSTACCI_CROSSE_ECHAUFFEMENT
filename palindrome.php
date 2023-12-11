<?php

salutation();

while (!empty($input = readline("C'est un palindrome ca ? \n"))) {
    if ($input == 'ciao') salutation(false);
    else if (strlen($input) == 1)
        echo "A une lettre c'est forcement un palindrome \n";
    else if ($input == strrev($input))
        echo "Bien dit !\n";
}
salutation(false);

function salutation($init = true) {
    $MORNING_TIME = new DateTime('06:00');
    $START_LAUNCH_TIME = new DateTime('12:00');
    $END_LAUNCH_TIME = new DateTime('13:00');
    $EVENING_TIME = new DateTime('18:00');
    $NOW_TIME = new DateTime(date('H:m:s'));

    $night_text = $init ? 'Bonsoir' : 'Bonne soiree';
    $day_text = $init ? 'Bonjour' : 'Bonne journee';
    if ($MORNING_TIME <= $NOW_TIME && $NOW_TIME < $EVENING_TIME)
        echo "$day_text \n";
    else if ($EVENING_TIME <= $NOW_TIME && $NOW_TIME < $MORNING_TIME)
        echo "$night_text \n";

    if (!$init) exit;
}

