<?php
require_once './Runnable.php';
require_once './ShowInfo.php';

class Pet implements Runnable, ShowInfo
{
    private $name;
    private $distance;

    function __construct($name)
    {
        $this->name=$name;
        $this->distance=0;
    }

    function getName()
    {
        return $this->name;
    }
    
    function runFor($distance)
    {
        $this->distance += $distance;
    }

    function runningDistance()
    {
        return $this->distance;
    }

    function showInfo()
    {
        printf("Name:%30s",$this->name);
    }

    function showLongInfo()
    {
        printf("Name:%24s\n",$this->name);
        printf("Running distance:%8d km",$this->distance);
    }
}
