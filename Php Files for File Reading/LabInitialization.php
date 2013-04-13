<?php
  class LabInitialization
  {

     const NUMBEROFSTATIONSPERCELL = 5;
     private $stationMeanIdleTimes = array();
     private $stationMeanProcessTimes = array();
     private $stationSigmaIdleTimes = array();
     private $stationSigmaProcessTimes = array();

     public function __construct()
     {
       $this -> stationMeanIdleTimes = array(10,10,10,10,10);
       $this -> stationMeanProcessTimes = array(5,5,5,5,5);
       $this -> stationSigmaIdleTimes = array(2,2,2,2,2);
       $this -> stationSigmaProcessTimes = array(5,5,5,5,5);
     }

     public function setUpLab($tableWriter)
     {
       $grapher = new Grapher();
       $overallStation = new OverallInformation(self::NUMBEROFSTATIONSPERCELL,$tableWriter, $grapher); 
       $stationArray = array();
       
       for($i = 0; $i < self::NUMBEROFSTATIONSPERCELL; $i++)
       { 
         $stationArray[$i] = new StationInformation($i+1,$tableWriter,$grapher,$this -> stationMeanIdleTimes[$i],$this -> stationMeanProcessTimes[$i],$this -> stationSigmaIdleTimes[$i],$this -> stationSigmaProcessTimes[$i],$overallStation);
       }
       $sensorArray = array();
       for($i = 0; $i < self::NUMBEROFSTATIONSPERCELL; $i++)
       { 
         if($i == self::NUMBEROFSTATIONSPERCELL - 1)
         {
           $sensorArray[$i] = new SensorInformation($i+1,$stationArray[$i],null);
         }
         else
         {
           $sensorArray[$i] = new SensorInformation($i+1,$stationArray[$i],$stationArray[$i + 1]);
         }
       }
       for($i = 0; $i < self::NUMBEROFSTATIONSPERCELL; $i++)
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
         if($i == self::NUMBEROFSTATIONSPERCELL - 1)
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
