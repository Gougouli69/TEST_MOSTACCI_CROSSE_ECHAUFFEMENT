<?php
 
 namespace Infra\Repository\Computer\Time;


use DateTime;

class TimeComputer implements TimeInterface {

    public function getTime(): DateTime{
        return new DateTime(date("H:i:s"));
    }


}