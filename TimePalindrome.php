<?php

const MORNING_BEGIN   = new DateTime("08:00");
const AFTERNOON_BEGIN = new DateTime("14:00");
const EVENING_BEGIN   = new DateTime("18:00");
const NIGHT_BEGIN     = new DateTime("23:00");

const MORNING_HIWORD   = "Bonjour";
const AFTERNOON_HIWORD = "Bon après-midi";
const EVENING_HIWORD   = "Bonsoir";
const NIGHT_HIWORD     = "Bonne nuit";

const MORNING_BYEWORD = "Bonne journée";
const AFTERNOON_BYEWORD = AFTERNOON_HIWORD;
const EVENING_BYEWORD = EVENING_HIWORD;
const NIGHT_BYEWORD = NIGHT_HIWORD;

const NOBACKTOLINE   = "";
const BACKTONEXTLINE = "\n"; // Back to the next line after the text printed
const JUMPLINE       = "\n\n"; // Back and jump one line after the text printed

const ISAPALINDROMESUCCESSTEXT = "Bien dit !";

class TimePalindrome {   

    /**
     * @param Datetime $momentOfTheDay
     * 
     * @return string The hi-word in function of the moment of the day.
     */
    function getHiMessageDependingOnDayMoment(DateTime $momentOfTheDay) {
        
        if ($momentOfTheDay >= MORNING_BEGIN && $momentOfTheDay < AFTERNOON_BEGIN) 
            return MORNING_HIWORD;

        else if ($momentOfTheDay >= AFTERNOON_BEGIN && $momentOfTheDay < EVENING_BEGIN) 
            return AFTERNOON_HIWORD;

        else if ($momentOfTheDay >= EVENING_BEGIN && $momentOfTheDay < NIGHT_BEGIN) 
            return EVENING_HIWORD;

        else 
            return NIGHT_HIWORD;   
    }

    
    /**
     * @param Datetime $momentOfTheDay
     * 
     * @return string The bye-word in function of the moment of the day.
     */
    function getByeMessageDependingOnDayMoment(DateTime $momentOfTheDay) {
        
        if ($momentOfTheDay >= MORNING_BEGIN && $momentOfTheDay < AFTERNOON_BEGIN) 
            return MORNING_BYEWORD;

        else if ($momentOfTheDay >= AFTERNOON_BEGIN && $momentOfTheDay < EVENING_BEGIN) 
            return AFTERNOON_BYEWORD;

        else if ($momentOfTheDay >= EVENING_BEGIN && $momentOfTheDay < NIGHT_BEGIN) 
            return EVENING_BYEWORD;

        else 
            return NIGHT_BYEWORD;   
    }

    
    /**
     * @param string $string Text to test if it's a palindrome
     * @return boolean 
     */
    function textIsAPalindrome(string $string) {
        $string = strtolower($string);
        return strrev($string) == $string;
    }

    function sayInConsole(string $string, $endOfLIne = BACKTONEXTLINE) {
        echo $string . $endOfLIne;
    }
    
}