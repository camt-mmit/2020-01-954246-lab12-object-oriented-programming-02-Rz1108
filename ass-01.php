<?php
/**
     * ID:602110198
     * Name: Jingrong Zhuang
     * WeChat: Rz
     */

     require_once './Car.php';
     Class Bus extends Car
     {
         private $capacity;
         private $passengern;
         private $fuel;
         function __construct($owner,$pistonv,$capacity)
         {
             parent::__construct($owner, $pistonv);
             $this->capacity=$capacity;
             $this->passengern=0;
             $this->fuel=0;
         }

         function load($number_of_passenger)
         {
             $n=$this->passengern + $number_of_passenger;
             if ($n>$this->capacity){
                 fprintf(STDERR,"Number of passengers greater than capacity!!!\n");
                 return false;
             }
             else {$this->passengern += $number_of_passenger;
                    return true; }
         }

         function unload($number_of_passenger)
         {
             $nn=$this->passengern-$number_of_passenger;
             if($nn<0){
                 fprintf(STDERR,"Number of passengers less than 0!!!\n");
                 return false;
             }
             else{
                 $this->passengern -= $number_of_passenger;
                return true; }
         }

         function runFor($km)
         {
        $result1 = parent::runFor($km);
        $result2=$this->load($number_of_passenger);
        $result3=$this-> unload($number_of_passenger);
        if($result1==true && ($result2==true || $result3==true)) {
            $this->fuel += (($km /120) * ($this->pistonVolume() / 1000) + (($this->passengern * $km * 70) / 10000));
        }
        return $result1;
        }
        
         function fuelUsed(){
             return $this->fuel;
         }

         function showLongInfo()
    {
        $result = parent::showLongInfo();
        if($result) {
            printf("Current passengers:  %10s\n",
                number_format($this->passengern, 2));
        }

        return $result;
    }
     }

     printf("Input (owner cc capacity): ");
     fscanf(STDIN, "%s %d %d", $owner, $cc,$capacity);
     $bus = new Bus($owner, $cc,$capacity);

     while(true) {
        printf("command (h for help): ");
        $command = null;
        $value = null;
        fscanf(STDIN, "%s %d", $command, $value);
        if(strtolower($command) === 'e') break;
        switch(strtolower($command)) {
            case '0':
                $bus->engineStop();
            break;
            case '1':
                $bus->engineStart();
            break;
            case 'r':
                $bus->runFor($value);
            break;
            case '+':
                $bus->load($value);
            break;
            case '-':
                $bus->unload($value);
            break;
            case 'i':
                $bus->showLongInfo();
            break;
            case 'h':
                printf(
    <<<EOT
     0 stop engine
     1 start engine
     r run for the given km
     + load the given number of passengers into bus
     - unload the given number of passengers out of bus
     i show information (engine is off only)
     e exit
     h print this help
    
    EOT
                );
            break;
            default:
                fprintf(STDERR, "Unkown command '%s' !!!\n", $command);
        }
    }