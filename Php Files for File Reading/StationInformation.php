<?php
  class StationInformation
  {
    private $cellNumber = 1;
    private $stationNumber;
    private $previousStation;
    private $nextStation;
    private $previousSensor;
    private $nextSensor;
    private $processTimes = array();
    private $countOfTimesInProcessTimes = 0;
    private $accumulatedProcessTime = 0;
    private $accumulatedProcessTimeCount = 0;
    private $averageProcessTime;
    private $idleTimes = array();
    private $lastIdleTime;
    private $countOfTimesInIdleTimes = 0;
    private $accumulatedIdleTime = 0;
    private $accumulatedIdleTimeCount = 0;
    private $averageIdleTime;
    private $currentCarNumber = 0;
    private $status = 1;
    private $tableWriter;
    private $grapher;
    private $meanIdleTimeForStation;
    private $meanProcessTimeForStation;
    private $sigmaIdleTimeForStation;
    private $sigmaProcessTimeForStation;
    const NUMBEROFTIMESINARRAY = 10;
    private $overallStation;
    
    public function __construct($newStationNumber, $newTableWriter,$newGrapher,$newMeanIdleTime, $newMeanProcessTime, $newSigmaIdleTime, $newSigmaProcessTime, $newOverallStation)
    {
      $this -> stationNumber = $newStationNumber;
      $this -> tableWriter = $newTableWriter;
      $this -> grapher = $newGrapher;
      $this -> meanIdleTimeForStation = $newMeanIdleTime;
      $this -> meanProcessTimeForStation = $newMeanProcessTime;
      $this -> sigmaIdleTimeForStation = $newSigmaIdleTime;
      $this -> sigmaProcessTimeForStation = $newSigmaProcessTime;
      $this -> overallStation = $newOverallStation;
    }

    public function setPreviousStation($newPreviousStation)
    {
       $this -> previousStation = $newPreviousStation;
    }

    public function setNextStation($newNextStation)
    {
       $this -> nextStation = $newNextStation;
    }

    public function setPreviousSensor($newPreviousSensor)
    {
       $this -> previousSensor = $newPreviousSensor;
    }

    public function setNextSensor($newNextSensor)
    {
       $this -> nextSensor = $newNextSensor;
       echo "Setting next sensor\n";
    }


    public function addProcessTime($time)
    {
       $this -> addTimePoint($time, $this -> accumulatedProcessTimeCount, $this -> accumulatedProcessTime, $this -> countOfTimesInProcessTimes, $this -> processTimes);
       $this -> averageProcessTime = $this -> accumulatedProcessTime / $this -> accumulatedProcessTimeCount;
       if(count($this -> processTimes) == self::NUMBEROFTIMESINARRAY)
       {
         $isOnAlert = $this -> isSystemOutOfControl($this -> processTimes, $this -> sigmaProcessTimeForStation);
         if(!$isOnAlert)
         {
           if($this -> processTimes[self::NUBMEROFTIMESINARRAY - 1] > 2 * $this -> sigmaProcesTimeForStation)
           {
             $isWarning = true;
             $this -> updateStatus(2,$this -> currentCarNumber);
           }
           else
           {
             $isWarning = false;
             $this -> updateStatus(1,$this -> currentCarNumber);
           }
         }
         else
         {
           $this -> updateStatus(3,$this -> currentCarNumber);
         }
       }
       echo "Mean Process Time for station: ".$this ->meanProcessTimeForStation."\n";
       echo "Sigma Process Time for station: ".$this -> sigmaProcessTimeForStation."\n";
       echo "Sigma Process Time for station * 3: ".($this -> sigmaProcessTimeForStation * 3)."\n";
       $this -> grapher -> makeGraph($this -> processTimes, $this ->meanProcessTimeForStation, $this -> sigmaProcessTimeForStation * 3 + $this -> meanProcessTimeForStation, "Cell1Station".$this -> stationNumber."ProcessGraph.png");
       $this -> tableWriter -> writeToTable($this -> cellNumber,$this -> stationNumber, "average_process_time", $this -> averageProcessTime);
       $this -> overallStation -> updateAverageProcessTime($this -> accumulatedProcessTime/$this -> accumulatedProcessTimeCount, $this -> stationNumber);
       $totalStationTime = $time + $this -> lastIdleTime;//not sure if this is order safe
       $this -> overallStation -> updateBottleNeckStation($totalStationTime, $this -> stationNumber);
       $this -> overallStation -> updateTotalTime($this -> currentCarNumber, $totalStationTime, $this -> stationNumber);
       
    }

    public function addIdleTime($time)
    {
       $this -> lastIdleTime = $time;
       $this -> addTimePoint($time, $this -> accumulatedIdleTimeCount, $this -> accumulatedIdleTime, $this -> countOfTimesInIdleTimes, $this -> idleTimes);
       $this -> averageIdleTime = $this -> accumulatedIdleTime / $this -> accumulatedIdleTimeCount;
       if(count($this -> idleTimes) == self::NUMBEROFTIMESINARRAY)
       {
         $isOnAlert = $this -> isSystemOutOfControl($this -> idleTimes, $this -> sigmaIdleTimeForStation);
         if(!$isOnAlert)
         {
           if($this -> idleTimes[self::NUBMEROFTIMESINARRAY - 1] > 2 * $this -> sigmaIdleTimeForStation)
           {
             $isWarning = true;
             $this -> updateStatus(2,$this -> currentCarNumber);
           }
           else
           {
             $isWarning = false;
             $this -> updateStatus(1,$this -> currentCarNumber);
           }
         }
         else
         {
           $this -> updateStatus(3,$this -> currentCarNumber);
         }
       }
       $this -> overallStation -> updateAverageIdleTime($this -> accumulatedIdleTime/$this -> accumulatedIdleTimeCount, $this -> stationNumber);
       $this -> grapher -> makeGraph($this -> idleTimes, $this ->meanIdleTimeForStation, $this -> sigmaIdleTimeForStation * 3 + $this -> meanIdleTimeForStation, "Cell1Station".$this -> stationNumber."IdleGraph.png");
     $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> stationNumber, "average_idle_time", $this -> averageIdleTime);
    }

    private function addTimePoint($time,&$numberOfTimes,&$totalTime,&$countOfTimeArrayPoints,&$timeArray)
    {
       $numberOfTimes = $numberOfTimes + 1;
       $totalTime = $totalTime + $time;
       //if full - remove then add
       if($countOfTimeArrayPoints  == self::NUMBEROFTIMESINARRAY)
       {
         array_shift($timeArray);
         array_push($timeArray ,$time);
       }
       //else - just add
       else
       {
         array_push($timeArray ,$time);
         $countOfTimeArrayPoints = $countOfTimeArrayPoints + 1;
       }
    }

    public function updateStatus($newStatus, $carNumber)
    {
      if($this -> currentCarNumber < $carNumber)
      {
        $this -> currentCarnumber = $carNumber;
        $this -> status = $newStatus;
        $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> stationNumber, "status", $this -> status);
      }
      else if($newStatus > $this -> status)
      {
        $this -> status = $newStatus;
        $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> stationNumber, "status"
, $this -> status);
      }
    }


   //This function returns true if the process is out of control according
    // to the Shewhart Control Chart rules and false other wise.
    //this function need to have as least 6 points to work
    // I haven't tested this function yet.
    // Assuming this function is called every time the program runs
    // we also need to ask how long they get to get a base before throwing
    // these errors.
    public function isSystemOutOfControl($timeArray, $sigma)
    {
       //check if last added value is outside 3 sigmas
       if($this -> $timeArray[self::NUMBEROFTIMESINARRAY - 1] 
             > $sigma * 3)
       {
         return TRUE;
       }
       // see if last 2 out of 3 points were past 2 sigmas
       $count = 0;
       for($i = self::NUMBEROFTIMESINARRAY - 3; $i < self::NUMBEROFTIMESINARRAY; 
               $i++)
       {
         if($timeArray[$i] > $sigma * 2)
         {
           $count = $count + 1;
         }
         if($count == 2)
         {
           return TRUE;
         } 
       }
       // see if 4 of last 5 are beyond 1 sigma
       $count = 0;
       for($i = self::NUMBEROFTIMESINARRAY - 5; $i < self::NUMBEROFTIMESINARRAY; 
               $i++)
       {
         if($timeArray[$i] > $sigma)
         {
           $count = $count + 1;
         }
         if($count == 4)
         {
           return TRUE;
         } 
       }
       // see if last six points are increasing
       $lastValue = 0;
       for($i = self::NUMBEROFTIMESINARRAY - 5; $i < self::NUMBEROFTIMESINARRAY; 
               $i++)
       {
         if($lastValue = 0)
         {
           $lastValue = $this -> $timeArray[$i];
         }
         else if($timeArray[$i] > $lastValue) 
         {
           $lastValue = $timeArray[$i];
         }
         else
         {
           break;
         }
         if($i == self::NUMBEROFTIMESINARRAY - 1)
         {
           return TRUE;
         } 
       }
       return FALSE;
    }

    public function calculateProcessTimeFromSensorOnTime($onTime, $carNumber)
    {
      $this -> currentCarNumber = $carNumber;

      if($this -> previousSensor != null)
      {
        $stationOnTime = $this -> previousSensor -> getOutOfOffTimeArray($carNumber);
        if($stationOnTime != 0)
        {
          $stationOffTime = $onTime;
          $processTime = $stationOffTime - $stationOnTime;
          $this -> previousSensor -> setInOffTimeArray($carNumber, 0);
          $this -> nextSensor -> setInOnTimeArray($carNumber, 0);
          echo "Station on time: ".$stationOnTime."\n";
          echo "Station off time: ".$stationOffTime."\n";
          echo "1.Process Time for car ".$carNumber.": ".$processTime."\n";
          $this -> addProcessTime($processTime);
        }
      }
      else
      {
        if($carNumber == 1)
        {
          $processTime = $onTime;
          echo "2.Process Time for car ".$carNumber.": ".$processTime."\n";
        }
        else
        {
          echo "This on time: ".$onTime."\n";
          echo "Last on time: ".$this -> nextSensor -> getOutOfOnTimeArray($carNumber - 1)."\n";
          $processTime = $onTime - $this -> nextSensor -> getOutOfOnTimeArray($carNumber - 1);
          $this -> nextSensor -> setInOnTimeArray($carNumber - 1,0); // this might be wrong
          echo "3.Process Time for car ".$carNumber.": ".$processTime."\n";
        }
        $this -> addProcessTime($processTime);
      }
      
    }

    public function calculateProcessTimeFromSensorOffTime($offTime, $carNumber)
    {
      $this -> currentCarNumber = $carNumber;
      if($this -> stationNumber != 5)
      {
        $stationOffTime = $this -> nextSensor -> getOutOfOnTimeArray($carNumber);
        if($stationOffTime != 0)
        {
          $stationOnTime = $offTime;
          $processTime = $stationOffTime - $stationOnTime;
          $this -> previousSensor -> setInTimeArray($carNumber,0);
          $this -> nextSensor -> setInTimeArray($carNumber , 0);
          echo "4.Process Time for car ".$carNumber.": ".$processTime."\n";
          $this -> addProcessTime($stationOnTime);
        }
      }
    }

  }
?>
