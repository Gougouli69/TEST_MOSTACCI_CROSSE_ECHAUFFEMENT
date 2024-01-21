<?php

namespace Infra\Adapter\Time;

use Domain\Classes\Moment\DefaultMoment;
use Domain\Classes\Moment\EveningMoment;
use Domain\Classes\Moment\MomentInterface;
use Domain\Classes\Moment\MorningMoment;
use Domain\Classes\Moment\NightMoment;

class TimeMomentAdapter {

    public static $MORNING_BEGIN   ;
    public static $AFTERNOON_BEGIN ;
    public static $EVENING_BEGIN   ;
    public static $NIGHT_BEGIN     ;
    
    public function __construct(){
        self::$MORNING_BEGIN   = new \DateTime("08:00");
        self::$AFTERNOON_BEGIN = new \DateTime("14:00");
        self::$EVENING_BEGIN   = new \DateTime("18:00");
        self::$NIGHT_BEGIN     = new \DateTime("23:00");
    }

    public function getMomentFromTime(\DateTime $time): MomentInterface
    {
        if ($time <= self::$MORNING_BEGIN) 
            return new NightMoment;
        
        if ($time <= self::$AFTERNOON_BEGIN) 
            return new MorningMoment;

        if ($time <= self::$EVENING_BEGIN)
            return new MorningMoment; 

        if ($time <= self::$NIGHT_BEGIN)
            return new MorningMoment; 
        
        return new DefaultMoment;
    }

}