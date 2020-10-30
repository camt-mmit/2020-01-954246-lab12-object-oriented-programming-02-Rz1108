<?php
/**
     * ID:602110198
     * Name: Jingrong Zhuang
     * WeChat: Rz
     */

require_once './PetLover.php';
Class WalkPets extends PetLover
{
     function showLongInfo()
     {
          var_dump($this->pet);
          parent::showLongInfo();
          echo str_repeat("=",40);
          echo "\n";
          for ($i=0;;$i++)
        {
            if($this->pet[$i]['name']==null) break;
            else 
            {
               printf("Name: %s\n",$this->pet[$i]['name']);
               printf("Running distance:%15dkm\n",$this->pet[$i]['distance']);
               echo str_repeat("-",40);
               echo "\n";
            }
        }

     }
}

$file=fopen($_SERVER['argv'][1],'r');
$petlover=fgets($file);
$walkpet= new WalkPets($petlover);
$n_pet=fgets($file);
for ($i=0;$i<$n_pet;$i++){
     $petname[]=fgets($file);
}
$n_command=fgets($file);
for ($i=0;$i<$n_command;$i++)
{
     fscanf($file,"%s %s",$command,$content);
     if ($command=='r') $walkpet->runFor($content);
     else if ($command=='t') $walkpet->takepet($content);
     else if ($command=='re') $walkpet->release($content);
     else printf("Please Check Text in Line %d",$n_pet+$i+4);
}
$walkpet->showLongInfo();

