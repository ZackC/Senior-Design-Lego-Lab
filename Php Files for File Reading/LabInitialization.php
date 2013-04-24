<?php
/*function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');*/

  /**
   *
   * This class initializes the laboratory set up in the correct order.
   *
   */
  class LabInitialization
  {
     // the total number of the station per cell
     const NUMBEROFSTATIONSPERCELL = 5;
     // the array of the mean idle times for the stations
     private $stationMeanIdleTimes = array();
     // the array of the mean process times for the stations
     private $stationMeanProcessTimes = array();
     // the array of the standard deviations of the idle times
     private $stationSigmaIdleTimes = array();
     // the array of the standard deviations of the process times
     private $stationSigmaProcessTimes = array();

     // the constructor that intializes the array values.  It holds all of the 
     // information for the different stations
     public function __construct()
     {
       $this -> stationMeanIdleTimes = array(0,10,10,10,10);
       $this -> stationMeanProcessTimes = array(86,53,73,67,75);
       $this -> stationSigmaIdleTimes = array(0,2,2,2,2);
       $this -> stationSigmaProcessTimes = array(17,21,18,29,9);
     }

    /*
     *
     * This method makes sure the overall information, station information, and
     * sensor information are all initialized correctly 
     *
     */
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
