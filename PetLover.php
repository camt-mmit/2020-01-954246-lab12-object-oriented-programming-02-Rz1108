<?php
 require_once './Person.php';
 require_once './ShowInfo.php';

class PetLover extends Person implements ShowInfo
{
    protected $pet;
    private $petnames;

    function __construct($name)
    {
        parent::__construct($name);
        $this->petnames=[];
        $this->pet=[];
        
    }

    function takepet($petname)
    {
        $petinfo['name']=$petname;
        $this->petnames[]=$petname;
        $petinfo['status']=true;
        $petinfo['distance']=0;
        $petinfos[]=$petinfo;
        
        for ($i=0;;$i++)
        {
            if ($petinfos[$i]['name']==null) break;
            else
            {
                $check=array_count_values($this->petnames);
                $get=array_keys($check,1);
                foreach($get as $gets)
                {
                    if($gets==$petname) $this->pet[]=$petinfo;
                    else $this->pet[$i]['status']=true;
                }
            }
            var_dump($this->pet);
        }
     
    }
    
    
    function release($petname)
    {
        for($i=0;;$i++)
        {
           if ($this->pet[$i]['name']==null) break;
           if ($this->pet[$i]['name']===$petname) $this->pet[$i]['status']=false;
        }
    }

    function runFor($km)
    {
        $this->distance += $km;
        for($i=0;;$i++)
        {
            if ($this->pet[$i]['status']==true) $this->pet[$i]['distance'] += $km;
            if ($this->pet[$i]['name']==null) break;
        }
    }

    function showInfo()
    {
        printf("Name: %s",$this->name);
    }

    function showLongInfo()
    {
        printf("Name: %s",$this->name);
        printf("Running distance: %13d km\n",$this->distance);
        printf("Current taken pets: ");
        for ($i=0;;$i++)
        {  
            if ($this->pet[$i]['status']==true) $walkingpet[]=$this->pet[$i]['name'];
            if($this->pet[$i]['name']==null) break;
        }
        for ($i=0;;$i++)
        {
            if($i==0) printf("%s",$walkingpet[$i]);
            else if($walkingpet[$i]==null) break;
            else printf(", %s",$walkingpet[$i]);
        }
        echo"\n";
    }
}

