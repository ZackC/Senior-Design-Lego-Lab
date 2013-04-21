<?php
  //spl_autoload_register('my_autoloader');
  
 /*
  * The class that holds information for specific sensors
  */
  class SensorInformation
  {
    //the array of the last on times
    private $onTimeArray = array();
    //the array of the last off times
    private $offTimeArray = array();
    //the car number for the last time file
    private $timeCarNumber = 0;
    //the car number for the defect time file
    private $defectCarNumber = 0;
    //the number of the sensor
    private $sensorNumber;
    //the station object before the sensor
    private $stationBeforeSensor;
    //the station object after the sensor
    private $stationAfterSensor;
    //the number of times in the last times array
    const NUMBEROFTIMESKEPT = 20;
    //the last defect time from the sensor
    private $lastDefectTime;
    //the list of the time files (written as thier car number) that will not be 
    //comming through due to previous defects
    private $futureTimeCarsWithDefectList = array();
    //the list of the defect files (written as thier car number) that will not be 
    //comming through due to previous defects
    private $futureDefectCarsWithDefectList = array();
    //the array of booleans for it the corresponding on time in the onTimeArray
    //has already been used once.  This is necessary because station 5 has to 
    //use the on times for 2 different calculations so the on time can not be
    //removed until both are calculated
    private $station5sOnTimesAlreadyUsed = array();

    //the constructor for the class 
    //newSensorNumber - the sensor number for the class
    //newStationBeforeSensor - the station before the sensor
    //newStationAfterSesnsor - the station after the sensor 
    public function __construct($newSensorNumber, $newStationBeforeSensor, $newStationAfterSensor)
    {
      $this -> sensorNumber = $newSensorNumber;
      $this -> stationBeforeSensor = $newStationBeforeSensor;
      $this -> stationAfterSensor = $newStationAfterSensor;
      $this -> onTimeArray = array_pad($this -> onTimeArray, self::NUMBEROFTIMESKEPT, 0);
      $this -> offTimeArray = array_pad($this -> offTimeArray, self::NUMBEROFTIMESKEPT, 0);
      if($this -> sensorNumber == 5)
      {
        $this -> station5sOnTimesAlreadyUsed = array_pad($this -> station5sOnTimesAlreadyUsed, self::NUMBEROFTIMESKEPT, false);
      }
    }

    //updates the sensor's on time and off time
    public function updateSensor($onTime, $offTime)
    {
      $this -> addTimeToOnTimeArray($onTime);
      $this -> addTimeToOffTimeArray($offTime);
      if($this -> sensorNumber != 5) //may want to find a way not to hard code 5 later, also could check if not null after testing
      {
        $this -> stationAfterSensor -> addIdleTime($offTime - $onTime, $this -> timeCarNumber);
      }
    }

    //adds the on time to the on time array
    public function addTimeToOnTimeArray($newOnTime)
    {
      $this -> onTimeArray[$this -> timeCarNumber % self::NUMBEROFTIMESKEPT] = $newOnTime;
      //haven't decided what this next function is yet
      $this -> stationBeforeSensor -> calculateProcessTimeFromSensorOnTime($newOnTime, $this -> timeCarNumber);
    }

    //adds the off time to the off time array
    public function addTimeToOffTimeArray($newOffTime)
    {
       $this -> offTimeArray[$this -> timeCarNumber % self::NUMBEROFTIMESKEPT] = $newOffTime;
       //haven't decided what this next function is yet
       if($this -> sensorNumber < 5) // might want to make it not a hard code of 5.  Also could check for null when we are sure everything else is correct.
       {
         $this -> stationAfterSensor -> calculateProcessTimeFromSensorOffTime($newOffTime, $this -> timeCarNumber);
       }
    }

    //increments the time car number and checks if the car number was in the 
    //futureTimeCarsWithDefectList
    public function incrementTimeCarNumber()
    {
      while(count($this -> futureTimeCarsWithDefectList) > 0 and $this -> futureTimeCarsWithDefectList[0] == $this -> timeCarNumber + 1)
      {
         echo "???????????????????\n";
         echo "Found in defect list:".($this -> timeCarNumber + 1)."\n";
         echo "Time being set to: ".($this -> timeCarNumber + 2)."\n";
         echo "???????????????????\n";
         $this -> timeCarNumber = $this -> timeCarNumber + 1;
         array_shift($this -> futureTimeCarsWithDefectList); 
      }
        $this -> timeCarNumber = $this -> timeCarNumber + 1;
    }

    //increments the defect car number, adds the car to the future time and 
    //defect arrays when carNumberOfDefects is set, also checks if the current
    //carNumber is already in the defect car nubmer
    public function incrementDefectCarNumber($isDefect, $carNumberOfDefect = 0)
    {
      while(count($this -> futureDefectCarsWithDefectList) > 0 and $this -> futureDefectCarsWithDefectList[0] == $this -> defectCarNumber + 1)
      {
         $this -> defectCarNumber = $this -> defectCarNumber + 1;
         array_shift($this -> futureDefectCarsWithDefectList); 
      }
      if($isDefect == false)
      {
        $this -> defectCarNumber = $this -> defectCarNumber + 1;
      }
      else
      {
        if($carNumberOfDefect != 0)
        {
          echo "&&&&&&&&&&&&&&&&&&&&&&&&&\n";
          echo "car with defect: ".$carNumberOfDefect." at station: ".$this-> sensorNumber."\n";
          echo "&&&&&&&&&&&&&&&&&&&&&&&&&\n";
          $this -> futureDefectCarsWithDefectList[] = $carNumberOfDefect;
          $this -> futureTimeCarsWithDefectList[] = $carNumberOfDefect;
        }
        else
        {
           $this -> defectCarNumber = $this -> defectCarNumber + 1;  
           $carNumberOfDefect =  $this -> defectCarNumber;
        } 
        if($this -> stationAfterSensor != null)
        {
           $this -> stationAfterSensor -> getNextSensor() -> incrementDefectCarNumber($isDefect, $carNumberOfDefect);
       // $this -> stationAfterSensor -> getNextSensor() -> incrementTimeCarNumber($carNumberOfDefect);
        }
      }
    }

    //returns the time car number
    public function getTimeCarNumber()
    {
      return $this -> timeCarNumber;
    }

    //returns the defect car number
    public function getDefectCarNumber()
    {
      return $this -> defectCarNumber;
    }

    //retuns the carNumber out of the out time array as long as it is still saved
    public function getOutOfOnTimeArray($carNumber)
    {
       return $this -> onTimeArray[$carNumber % self::NUMBEROFTIMESKEPT];
    }
   
    //this checks if it is ok to set the value in the on time array for the
    //specific car number.  used to make sure station 5's values are not
    //removed before all of the calculations are used
    public function checkThenSetInOnTimeArray($carNumber, $value)
    {
      if($this -> sensorNumber == 5)
      {
        if($this -> station5sOnTimesAlreadyUsed[$carNumber % self::NUMBEROFTIMESKEPT] == false)
        {
           $this -> station5sOnTimesAlreadyUsed[$carNumber % self::NUMBEROFTIMESKEPT] = true;
           return true;
        }
        else
        {
          $this -> station5sOnTimesAlreadyUsed[$carNumber % self::NUMBEROFTIMESKEPT] = false;
          $this -> onTimeArray[$carNumber % self::NUMBEROFTIMESKEPT] = $value;
        }
      }
      return false;
    }

    //sets the value in the on time time array for the car number
    public function setInOnTimeArray($carNumber, $value)
    {
      $this -> onTimeArray[$carNumber % self::NUMBEROFTIMESKEPT] = $value;
    }

    //gets the off time out of the off time array for the specific car number
    //if it is still there
    public function getOutOfOffTimeArray($carNumber)
    {
      return $this -> offTimeArray[$carNumber % self::NUMBEROFTIMESKEPT];
    }

    //sets the value for the carNumber in the off time array
    public function setInOffTimeArray($carNumber, $value)
    {
      $this -> offTimeArray[$carNumber % self::NUMBEROFTIMESKEPT] = $value; 
    }

    //returns the station before the sensor
    public function getBeforeStation()
    {
      return $this -> stationBeforeSensor;
    }

    //returns the last defect time for the station
    public function getLastDefectTime()
    {
      return $this -> lastDefectTime;
    }

    //sets the last defect time
    public function setLastDefectTime($newLastDefectTime)
    {
      $this -> lastDefectTime = $newLastDefectTime;
      $this -> stationBeforeSensor -> setLastDefectTime($newLastDefectTime);
    }
   
    //pases the defectCount of the sensor the before station to update the overall station
    public function passDefectCount($newDefectsCount)
    {
      $this -> stationBeforeSensor -> updateOverallDefectCount($newDefectsCount);
    }
  }
?>
