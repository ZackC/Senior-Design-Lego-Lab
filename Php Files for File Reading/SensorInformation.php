<?php
  class SensorInformation
  {
    private $onTimeArray = array();
    private $offTimeArray = array();
    private $timeCarNumber = 0;
    private $defectCarNumber = 0;
    private $sensorNumber;
    private $stationBeforeSensor;
    private $stationAfterSensor;
    const NUMBEROFTIMESKEPT = 20;
    private $lastDefectTime;
    private $futureTimeCarsWithDefectList = array();
    private $futureDefectCarsWithDefectList = array();

    public function __construct($newSensorNumber, $newStationBeforeSensor, $newStationAfterSensor)
    {
      $this -> sensorNumber = $newSensorNumber;
      $this -> stationBeforeSensor = $newStationBeforeSensor;
      $this -> stationAfterSensor = $newStationAfterSensor;
      $this -> onTimeArray = array_pad($this -> onTimeArray, self::NUMBEROFTIMESKEPT, 0);
      $this -> offTimeArray = array_pad($this -> offTimeArray, self::NUMBEROFTIMESKEPT, 0);
    }


    public function updateSensor($onTime, $offTime)
    {
      $this -> addTimeToOnTimeArray($onTime);
      $this -> addTimeToOffTimeArray($offTime);
      if($this -> sensorNumber != 5) //may want to find a way not to hard code 5 later, also could check if not null after testing
      {
        $this -> stationAfterSensor -> addIdleTime($offTime - $onTime, $this -> timeCarNumber);
      }
    }

    public function addTimeToOnTimeArray($newOnTime)
    {
      $this -> onTimeArray[$this -> timeCarNumber % self::NUMBEROFTIMESKEPT] = $newOnTime;
      //haven't decided what this next function is yet
      $this -> stationBeforeSensor -> calculateProcessTimeFromSensorOnTime($newOnTime, $this -> timeCarNumber);
    }

    public function addTimeToOffTimeArray($newOffTime)
    {
       $this -> offTimeArray[$this -> timeCarNumber % self::NUMBEROFTIMESKEPT] = $newOffTime;
       //haven't decided what this next function is yet
       if($this -> sensorNumber < 5) // might want to make it not a hard code of 5.  Also could check for null when we are sure everything else is correct.
       {
         $this -> stationAfterSensor -> calculateProcessTimeFromSensorOffTime($newOffTime, $this -> timeCarNumber);
       }
    }

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

    public function getTimeCarNumber()
    {
      return $this -> timeCarNumber;
    }

    public function getDefectCarNumber()
    {
      return $this -> defectCarNumber;
    }

    public function getOutOfOnTimeArray($carNumber)
    {
       return $this -> onTimeArray[$carNumber % self::NUMBEROFTIMESKEPT];
    }
   
    public function setInOnTimeArray($carNumber, $value)
    {
      $this -> onTimeArray[$carNumber % self::NUMBEROFTIMESKEPT] = $value;
    }

    public function getOutOfOffTimeArray($carNumber)
    {
      return $this -> offTimeArray[$carNumber % self::NUMBEROFTIMESKEPT];
    }

    public function setInOffTimeArray($carNumber, $value)
    {
      $this -> offTimeArray[$carNumber % self::NUMBEROFTIMESKEPT] = $value; 
    }

    public function getBeforeStation()
    {
      return $this -> stationBeforeSensor;
    }

    public function getLastDefectTime()
    {
      return $this -> lastDefectTime;
    }

    public function setLastDefectTime($newLastDefectTime)
    {
      $this -> lastDefectTime = $newLastDefectTime;
      $this -> stationBeforeSensor -> setLastDefectTime($newLastDefectTime);
    }

    public function passDefectCount($newDefectsCount)
    {
      $this -> stationBeforeSensor -> updateOverallDefectCount($newDefectsCount);
    }
  }
?>
