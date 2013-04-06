<?php
  class LabInitialization
  {

     private const NUBMEROFSTATIONSPERCELL = 5;
     private $stationMeanIdleTimes = array();
     private $stationMeanProcessTimes = array();
     private $stationSigmaIdleTimes = array();
     private $stationSigmaProcessTiems = array();

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
       
       return $sensorArray;
     }
  }
?>
