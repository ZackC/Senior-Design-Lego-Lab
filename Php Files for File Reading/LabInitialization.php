<?php
  class LabInitialization
  {

     const NUBMEROFSTATIONSPERCELL = 5;
     private $stationMeanIdleTimes = array();
     private $stationMeanProcessTimes = array();
     private $stationSigmaIdleTimes = array();
     private $stationSigmaProcessTimes = array();

     public function __construct()
     {
       $this -> stationMeanIdleTimes = array(10,10,10,10,10);
       $this -> stationMeanProcessTimes = array(50,50,50,50,50);
       $this -> stationSigmaIdleTimes = array(2,2,2,2,2);
       $this -> stationSigmaProcessTimes = array(5,5,5,5,5);
     }

     public function setUpLab($tableWriter)
     {
       $overallStation = new OverallInformation(self::NUMBEROFSTATIONSPERCELL,$tableWriter); 
       $stationArray = array();
       $grapher = new Grapher();
       for($i = 0; $i < self::NUMBEROFSTATIONSPERCELL; $i++)
       { 
         $stationArray[] = new StationInformation($i,$tableWriter,$grapher,$this -> stationMeanIdleTimes[$i],$this -> stationMeanProcessTimes[$i],$this -> stationSigmaIdleTimes[$i],$this -> stationSigmaProcessTimes,$overallStation);
       }
       $sensorArray = array();
       for($i = 0; $i < self::NUMBEROFSTATIONSPERCELL; $i++)
       { 
         if($i = self::NUMBEROFSTATIONSPERCELL - 1)
         {
           $sensorArray[] = new SensorInformation($i,$stationArray[$i],null);
         }
         else
         {
           $sensorArray[] = new SensorInformation($i,$stationArray[$i],$stationArray[$i + 1]);
         }
       }
       for($i = 0; $i < self::NUBMEROFSTATIONSPERCELL; $i++)
       {
         if($i == 0)
         {
           $stationArray[$i] -> setPreviousStation(null);
           $stationArray[$i] -> setPreviousSensor(null);
         }
         else
         { 
           $stationArray[$i] -> setPreviousStation($stationArray[$i - 1]);
           $stationArray[$i] -> setPreviousSensor($sensorArray[$i - 1]);
         }
         if($i = self::NUMBEROFSTATIONSPERCELL - 1)
         {
           $stationArray[$i] -> setNextStation(null);
         }
         else
         {
           $stationArray[$i] -> setNextStation($stationArray[$i + 1]);
         }
         $stationArray[$i] -> setNextSensor($sensorArray[$i]);
       }
       return $sensorArray;
     }
  }
?>
