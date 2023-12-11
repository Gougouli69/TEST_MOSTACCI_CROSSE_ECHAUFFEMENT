<?php

class TimePalindrome {

    const MORNING_BEGIN   = new DateTime("08:00");
    const AFTERNOON_BEGIN = new DateTime("14:00");
    const EVENING_BEGIN   = new DateTime("18:00");
    const NIGHT_BEGIN     = new DateTime("23:00");

    const MORNING_HIWORD   = "Bonjour";
    const AFTERNOON_HIWORD = "Bon après-midi";
    const EVENING_HIWORD   = "Bonsoir";
    const NIGHT_HIWORD     = "Bonne nuit";

    const MORNING_BYEWORD = "Bonne journée";
    const AFTERNOON_BYEWORD = TimePalindrome::AFTERNOON_HIWORD;
    const EVENING_BYEWORD = TimePalindrome::EVENING_HIWORD;
    const NIGHT_BYEWORD = TimePalindrome::NIGHT_HIWORD;

    const NOBACKTOLINE   = "";
    const BACKTONEXTLINE = "\n"; // Back to the next line after the text printed
    const JUMPLINE       = "\n\n"; // Back and jump one line after the text printed

    const ISAPALINDROMESUCCESSTEXT = "Bien dit !";

    /**
     * @param Datetime $momentOfTheDay
     * 
     * @return string The hi-word in function of the moment of the day.
     */
    function getHiMessageDependingOnDayMoment(DateTime $momentOfTheDay) {
        
        if ($momentOfTheDay >= TimePalindrome::MORNING_BEGIN && $momentOfTheDay < TimePalindrome::AFTERNOON_BEGIN) 
            return TimePalindrome::MORNING_HIWORD;

        else if ($momentOfTheDay >= TimePalindrome::AFTERNOON_BEGIN && $momentOfTheDay < TimePalindrome::EVENING_BEGIN) 
            return TimePalindrome::AFTERNOON_HIWORD;

        else if ($momentOfTheDay >= TimePalindrome::EVENING_BEGIN && $momentOfTheDay < TimePalindrome::NIGHT_BEGIN) 
            return TimePalindrome::EVENING_HIWORD;

        else 
            return TimePalindrome::NIGHT_HIWORD;   
    }

    
    /**
     * @param Datetime $momentOfTheDay
     * 
     * @return string The bye-word in function of the moment of the day.
     */
    function getByeMessageDependingOnDayMoment(DateTime $momentOfTheDay) {
        
        if ($momentOfTheDay >= TimePalindrome::MORNING_BEGIN && $momentOfTheDay < TimePalindrome::AFTERNOON_BEGIN) 
            return TimePalindrome::MORNING_BYEWORD;

        else if ($momentOfTheDay >= TimePalindrome::AFTERNOON_BEGIN && $momentOfTheDay < TimePalindrome::EVENING_BEGIN) 
            return TimePalindrome::AFTERNOON_BYEWORD;

        else if ($momentOfTheDay >= TimePalindrome::EVENING_BEGIN && $momentOfTheDay < TimePalindrome::NIGHT_BEGIN) 
            return TimePalindrome::EVENING_BYEWORD;

        else 
            return TimePalindrome::NIGHT_BYEWORD;   
    }

    
    /**
     * @param string $string Text to test if it's a palindrome
     * @return boolean 
     */
    function textIsAPalindrome(string $string) {
        $string = strtolower($string);
        return strrev($string) == $string;
    }
}