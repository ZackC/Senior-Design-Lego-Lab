<?php
  class SensorInformation
  {
    private $onTimeArray = array();
    private $offTimeArray = array();
    private $timeCarNumber = 0;
    private $defectCarNumber = 0;
    private $sensorNumber;
    private $stationBeforeSensor;
    private $stationAfterSensor
    private const NUMBEROFTIMESKEPT = 20;

    public function __construct($newSensorNumber, $newStationBeforeSensor, $newStationAfterSensor)
    {
      $this -> sensorNumber = $newSensorNumber;
      $this -> stationBeforeSensor = $newStationBeforeSensor;
      $this -> stationAfterSensor = $newStationAfterSensor;
      $this -> onTimeArray = array_pad($this -> onTimeArray, self::NUMBEROFTIMESKEPT, 0);
      $this -> offTimeArray = array_pad($this -> offTimeArray, self::NUMBEROFTIMESKEPT, 0);
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
       $this -> stationAfterSesnor -> calculateProcessTimeFromSensorOffTime($newOffTime, $this -> timeCarNumber);
    }

    public function incrementTimeCarNumber()
    {
      $this -> timeCarNumber = $this -> timeCarNumber + 1;
    }

    public function incrementDefectCarNumber()
    {
      $this -> defectCarNumber = $this -> defectCarNumber + 1;
    }
  }
?>
