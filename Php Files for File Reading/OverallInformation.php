<?php
   class OverallInformation
   {
     private $overallTime = array();
     private $bottleneckStationNumber;
     private $bottleneckArray = array();
     private $averageProcessTime;
     private $averageDefectTime;
     private $averageProcessTimeArray = array();
     private $averageIdleTimeArray = array();
     private $accumulatedTotalTime = 0;
     private $accumulatedTotalTimeCount = 0;
     private $tableWriter;
     const STATIONNUMBER = 0;
     const NUMBEROFTIMESKEPT = 20;
     private $stationsPerCell;
     
     public function __construct($newStationsPerCell, $newTableWriter)
     {
       $this -> stationsPerCell = $newStationsPerCell;
       $this -> overallTime = array_pad($this -> overallTime, self::NUMBEROFTIMESKEPT, 0);
       $this -> averageProcessTimeArray = array_pad($this -> averageProcessTimeArray, $newStationsPerCell, 0);
       $this -> averageIdleTimeArray = array_pad($this -> averageIdleTimeArray, $newStationsPerCell, 0);
       $this -> bottleneckArray = array_pad($this -> bottleneckArray, $newStationsPerCell, 0);
       $this -> tableWriter = $newTableWriter;
     }

     //may want to add a call to udpate the tables later
     public function updateAverageProcessTime($processTime,$stationNumber)
     {
        $this -> updateAverageTime($processTime, $stationNumber, $this -> averageProcessTimeArray, $this -> averageProcessTime);
     }

     private function updateAverageTime($newTimeValue, $stationNumber, $array, $averageTime)
     {
        if($stationNumber > 0 and $stationNumber < $this -> stationsPerCell)
        {
          $array[$stationNumber - 1] = $newTimeValue;
          $averageTime = array_sum($array)/count($array);
        }
        else
        {
          throw new Exception('stationNumber out of range.');
        }
     }

     //may want to add a call to udpate the tables later
     public function updateAverageIdleTime($idleTime, $stationNumber)
     {
        $this -> updateAverageTime($processTime, $stationNumber, $this -> averageIdleTimeArray, $this -> averageIdleTime);
     }

     //may want to add a call to udpate the tables later
     public function updateBottleNeckStation($stationTime, $stationNumber)
     {
       if($stationNumber > 0 and $stationNumber < $this -> stationsPerCell)
       {
         $this -> bottleneckArray[$stationNumber - 1] = $stationTime;
         $this -> bottleneckStationNumber = array_search(max($this -> bottleneckArray), $this -> bottleneckArray);  
       }
       else
       {
         throw new Exception('stationNumber out of range.');
       }
     }

     public function updateTotalTime($carNumber, $timeAmount, $stationNumber)
     {
       if($stationNumber == 1)
       {
         $this -> overallTime[$carNumber % self::NUMBEROFTIMESKEPT] = $timeAmount;
       }
       else if($stationNumber == $this -> stationsPerCell)
       {
          $index = $carNumber % self::NUMBEROFTIMESKEPT;
          $this -> overallTime[$index] = $timeAmount + $this -> overallTime[$index];
          //maybe write value to table here
       }
       else
       {
          $index = $carNumber % self::NUMBEROFTIMESKEPT;
          $this -> overallTime[$index] = $timeAmount + $this -> overallTime[$index];
       }
     }
     
     
     
   }
?>
