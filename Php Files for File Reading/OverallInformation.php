<?php
   class OverallInformation
   {
     private $overallTime = array();
     private $bottleneckStationNumber;
     private $bottleneckArray = array();
     private $averageProcessTime;
     private $averageIdleTime;
     private $averageDefectTime;
     private $averageProcessTimeArray = array();
     private $averageIdleTimeArray = array();
     private $accumulatedTotalTime = 0;
     private $accumulatedTotalTimeCount = 0;
     private $overallStationNumber = 0;
     private $cellNumber = 1;
     private $tableWriter;
     const STATIONNUMBER = 0;
     const NUMBEROFTIMESKEPT = 20;
     private $stationsPerCell;
     private $statusArray = array();
     private $defectTimeArray = array();
     private $totalDefectCount = 0;
     
     public function __construct($newStationsPerCell, $newTableWriter)
     {
       $this -> stationsPerCell = $newStationsPerCell;
       $this -> overallTime = array_pad($this -> overallTime, self::NUMBEROFTIMESKEPT, 0);
       $this -> averageProcessTimeArray = array_pad($this -> averageProcessTimeArray, $newStationsPerCell, 0);
       $this -> averageIdleTimeArray = array_pad($this -> averageIdleTimeArray, $newStationsPerCell, 0);
       $this -> bottleneckArray = array_pad($this -> bottleneckArray, $newStationsPerCell, 0);
       $this -> tableWriter = $newTableWriter;
       $this -> statusArray = array_pad($this -> statusArray, $newStationsPerCell, 1);
       $this -> defectTimeArray = array_pad($this -> defectTimeArray, $newStationsPerCell,0);
     }

     //may want to add a call to udpate the tables later
     public function updateAverageProcessTime($processTime,$stationNumber)
     {
       // echo "====================\n";
       // echo "Process Time: $processTime\n";
       // echo "Old average process time: ".$this->averageProcessTime."\n";
       // echo "station number:".$stationNumber."\n";
       // echo "Stations per cell".$this -> stationsPerCell."\n";
        $this -> updateAverageTime($processTime, $stationNumber, $this -> averageProcessTimeArray, $this -> averageProcessTime);
      //  echo "New average process time: ".$this->averageProcessTime."\n";
      //  echo "Updating overall average process time.\n";
       // echo "===============================\n";
        $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> overallStationNumber, "average_process_time", $this -> averageProcessTime);
     }

     private function updateAverageTime($newTimeValue, $stationNumber, &$array, &$averageTime)
     {
        if($stationNumber > 0 and $stationNumber < $this -> stationsPerCell + 1)
        {
          //echo "Before was old values now"
          $array[$stationNumber - 1] = $newTimeValue;
         // for($i = 0; $i < $this -> stationsPerCell; $i++)
         // {
         //   echo "Array value $i = ".$array[$i]."\n";
         // }
          $averageTime = array_sum($array)/count($array);
        //  echo "Average is: $averageTime\n";
        }
        else
        {
          throw new Exception('stationNumber out of range.'); // need to handle these later
        }
     }

     //may want to add a call to udpate the tables later
     public function updateAverageIdleTime($idleTime, $stationNumber)
     {
        $this -> updateAverageTime($idleTime, $stationNumber, $this -> averageIdleTimeArray, $this -> averageIdleTime);
        //echo "!!!!!Updating overall average idle time.\n";
        $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> overallStationNumber, "average_idle_time", $this -> averageIdleTime);
     }

     //may want to add a call to udpate the tables later
     public function updateBottleNeckStation($stationTime, $stationNumber)
     {
       if($stationNumber > 0 and $stationNumber < $this -> stationsPerCell + 1)
       {
         $this -> bottleneckArray[$stationNumber - 1] = $stationTime;
         $this -> bottleneckStationNumber = array_search(max($this -> bottleneckArray), $this -> bottleneckArray)+1; 
         echo "The bottleneck station is: ".$this -> bottleneckStationNumber.
         $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> overallStationNumber, "bottleneck", $this -> bottleneckStationNumber); 
       }
       else
       {
         throw new Exception('stationNumber out of range.'); // need to handle these later
       }
     }

     public function updateTotalTime($carNumber, $timeAmount, $stationNumber)
     {

         echo "Car number ".$carNumber." with station number: ".$stationNumber." and time: ".$timeAmount."\n";
       
       if($stationNumber == 1)
       {
         $this -> overallTime[$carNumber % self::NUMBEROFTIMESKEPT] = $timeAmount;
       }
       else if($stationNumber == $this -> stationsPerCell)
       {
          $index = $carNumber % self::NUMBEROFTIMESKEPT;
          $this -> overallTime[$index] = $timeAmount + $this -> overallTime[$index];
          $this -> accumulatedTotalTime = $this -> accumulatedTotalTime + $this -> overallTime[$index];
          echo "Overall finished with a process time of: ".$this->overallTime[$index]." for car number: ".$carNumber."\n";
          $this -> accumulatedTotalTimeCount = $this -> accumulatedTotalTimeCount +1;
          $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> overallStationNumber, "takt_time", $this -> accumulatedTotalTime/$this -> accumulatedTotalTimeCount); 
       }
       else
       {
          $index = $carNumber % self::NUMBEROFTIMESKEPT;
          $this -> overallTime[$index] = $timeAmount + $this -> overallTime[$index];
       }
     }
     
     public function updateStatus($newStatus, $stationNumber)
     {
        $this -> statusArray[$stationNumber - 1] = $newStatus; 
        $status = max($this -> statusArray);
        $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> overallStationNumber, "status", $status); 
     }
   
     public function updateDefectTimes($newDefectTime, $stationNumber)
     {
       //$this -> defectTimeArray[$stationNumber - 1] = $newDefectTime;
       //$lastDefectTime = max($this -> defectTimeArray);
       //$this -> tableWriter -> writeToTable($this -> cellNumber, $this -> overallStationNumber, "time_since_defect", $lastDefectTime);
       $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> overallStationNumber, "time_since_defect", $newDefectTime); 
     }
     
     public function updateTotalDefectCount($newDefectsCount)
     {
       $this -> totalDefectCount = $this -> totalDefectCount + $newDefectsCount;
       $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> overallStationNumber, "daily_defect", $this -> totalDefectCount); //0 for updating the overall station
     }

   }
?>
