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
    private $idleTimesForTotalTime = array();
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
    private $lastDefectTime;
    
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
      $this -> idleTimesForTotalTime = array_pad($this -> idleTimesForTotalTime, self::NUMBEROFTIMESINARRAY,0);
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
       //echo "Setting next sensor\n";
    }

    public function getNextSensor()
    {
       return $this -> nextSensor;
    }


    public function addProcessTime($time, $carNumber)
    {
       if($time > 3.5)
       {
         echo "$$$$$$$$$$$$$$$$$$$$$$$$$\n";
         echo "time = ".$time." station number: ".$this -> stationNumber." car number: ".$carNumber."\n";
         echo "$$$$$$$$$$$$$$$$$$$$$$$$$\n";
       }
       $this -> addTimePoint($time, $this -> accumulatedProcessTimeCount, $this -> accumulatedProcessTime, $this -> countOfTimesInProcessTimes, $this -> processTimes);
       echo "Old average process time for station ".$this -> stationNumber.": ".$this -> averageProcessTime."\n"; 
       echo "Process Time is: ".$time."\n";
       $this -> averageProcessTime = $this -> accumulatedProcessTime / $this -> accumulatedProcessTimeCount;
       echo "New average process time for station ".$this -> stationNumber.": ".$this -> averageProcessTime."\n"; 
       if($time > 2 * $this -> sigmaProcessTimeForStation + $this -> meanProcessTimeForStation)
       {
         $isWarning = true;
         $this -> updateStatus(2,$carNumber,2);
       }
       else
       {
         $isWarning = false;
         $this -> updateStatus(1,$carNumber,2);
       }
       if(count($this -> processTimes) == self::NUMBEROFTIMESINARRAY)
       {
         $isOnAlert = $this -> isSystemOutOfControl($this -> processTimes, $this -> sigmaProcessTimeForStation, $this -> meanProcessTimeForStation);
         if($isOnAlert)
         {
           $this -> updateStatus(3,$carNumber,2);
         }
       }
       //echo "Mean Process Time for station: ".$this ->meanProcessTimeForStation."\n";
       //echo "Sigma Process Time for station: ".$this -> sigmaProcessTimeForStation."\n";
       //echo "Sigma Process Time for station * 3: ".($this -> sigmaProcessTimeForStation * 3)."\n";
       $this -> grapher -> makeGraph($this -> processTimes, $this ->meanProcessTimeForStation, $this -> sigmaProcessTimeForStation * 3 + $this -> meanProcessTimeForStation,"Latest Process Times","Cell1Station".$this -> stationNumber."ProcessGraph.png");
       $this -> tableWriter -> writeToTable($this -> cellNumber,$this -> stationNumber, "average_process_time", $this -> averageProcessTime);
       $this -> overallStation -> updateAverageProcessTime($this -> accumulatedProcessTime/$this -> accumulatedProcessTimeCount, $this -> stationNumber);
       if($this -> stationNumber != 1)
       {
         if($this -> idleTimesForTotalTime[$carNumber % self::NUMBEROFTIMESINARRAY] != 0)
         {
           $totalStationTime = $time + $this -> idleTimesForTotalTime[$carNumber % self::NUMBEROFTIMESINARRAY];
           $this -> idleTimesForTotalTime[$carNumber % self::NUMBEROFTIMESINARRAY] = 0;
         }
         else
         {
           echo "station Number: ".$this -> stationNumber."\n";
           echo "station number equals 1: ".($this -> stationNumber == 1)."\n";
           echo "station number not equal 1: ".($this -> stationNumber != 1)."\n";
           die("Unable to get idle time for $carNumber\n");
         }
       }
       else
       {
         $totalStationTime = $time;
       }
       $this -> tableWriter -> writeToTable($this -> cellNumber,$this -> stationNumber, "takt_time", $totalStationTime);
       $this -> overallStation -> updateBottleNeckStation($totalStationTime, $this -> stationNumber);

       $this -> overallStation -> updateTotalTime($carNumber, $totalStationTime, $this -> stationNumber);
       
       
    }

    public function addIdleTime($time,$carNumber)
    {
       $this -> lastIdleTime = $time;
       $this -> idleTimesForTotalTime[$carNumber % self::NUMBEROFTIMESINARRAY] = $time;
       $this -> addTimePoint($time, $this -> accumulatedIdleTimeCount, $this -> accumulatedIdleTime, $this -> countOfTimesInIdleTimes, $this -> idleTimes);
       $this -> averageIdleTime = $this -> accumulatedIdleTime / $this -> accumulatedIdleTimeCount;
       if($this -> lastIdleTime > 2 * $this -> sigmaIdleTimeForStation + $this -> meanIdleTimeForStation)
       {
         $isWarning = true;
         $this -> updateStatus(2,$carNumber,3);
       }
       else
       {
         $isWarning = false;
         $this -> updateStatus(1,$carNumber,3);
       }
       if(count($this -> idleTimes) == self::NUMBEROFTIMESINARRAY)
       {
         $isOnAlert = $this -> isSystemOutOfControl($this -> idleTimes, $this -> sigmaIdleTimeForStation, $this -> meanIdleTimeForStation);
         if($isOnAlert)
         {
           $this -> updateStatus(3,$carNumber,3);
         }
       }
       $this -> overallStation -> updateAverageIdleTime($this -> accumulatedIdleTime/$this -> accumulatedIdleTimeCount, $this -> stationNumber);
       $this -> grapher -> makeGraph($this -> idleTimes, $this ->meanIdleTimeForStation, $this -> sigmaIdleTimeForStation * 3 + $this -> meanIdleTimeForStation,"Latest Idle Times", "Cell1Station".$this -> stationNumber."IdleGraph.png");
     $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> stationNumber, "average_idle_time", $this -> averageIdleTime);
    }

    public function addTimePoint($time,&$numberOfTimes,&$totalTime,&$countOfTimeArrayPoints,&$timeArray)
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

    public function updateStatus($newStatus, $carNumber, $timeErrorType = null)
    {
      //echo "{{{{{{{{{{{{{{{{{{{{{{{{{{{{\n";
      //echo "This station number: ".$this -> stationNumber."\n";
      //echo "Old Status: ".$this -> status."\n";
      //echo "New Status: $newStatus\n";
      //echo "Old car number: ".$this -> currentCarNumber."\n";
      //echo "New car number: ".$carNumber."\n";
      //echo "}}}}}}}}}}}}}}}}}}}}}}}}}}}}\n";
      $isNewStatus = false;
      if($this -> currentCarNumber < $carNumber)
      {
        $this -> currentCarNumber = $carNumber;
        $isNewStatus = true;
      }
      else if($newStatus > $this -> status)
      {
        $isNewStatus = true;
        
      }
      if($isNewStatus)
      {
        $this -> status = $newStatus;
        //echo "+++++++++++++++++++++++++++++\n";
        //echo "Station : ".$this -> stationNumber." writing status: ".$this -> status."\n";
        //echo "+++++++++++++++++++++++++++++\n";
        $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> stationNumber, "status"
, $this -> status);
        $this -> overallStation -> updateStatus($this -> status, $this -> stationNumber);
        echo "%%%%%%%%%%%%%%%%%%%%%%%%%%%%%\n";
        if($this -> status == 1)
        {
          $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> stationNumber, "error_type"
, 1);
          echo "Writing to error type: 1\n";
        }
        else if($timeErrorType != null)
        {
          $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> stationNumber, "error_type"
, $timeErrorType);
          echo "Writing to error type: ".$timeErrorType."\n";
        }
        else if($this -> status == 4)
        {
          $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> stationNumber, "error_type"
, 4);
          echo "Writing to error type: 4\n";
        }
        
        echo "%%%%%%%%%%%%%%%%%%%%%%%%%%%%%\n";
      }
    }


   //This function returns true if the process is out of control according
    // to the Shewhart Control Chart rules and false other wise.
    //this function need to have as least 6 points to work
    // I haven't tested this function yet.
    // Assuming this function is called every time the program runs
    // we also need to ask how long they get to get a base before throwing
    // these errors.
    public function isSystemOutOfControl($timeArray, $mean, $sigma)
    {
       echo "Values in time Array:\n";
       for($i = 0; $i < count($timeArray);$i++)
       {
         echo $timeArray[$i]."\n";
       }
       //check if last added value is outside 3 sigmas
       if($timeArray[(self::NUMBEROFTIMESINARRAY) - 1] 
             > $sigma * 3 + $mean)
       {
         echo "First true\n";
         return TRUE;
       }
       // see if last 2 out of 3 points were past 2 sigmas
       $count = 0;
       for($i = self::NUMBEROFTIMESINARRAY - 3; $i < self::NUMBEROFTIMESINARRAY; 
               $i++)
       {
         if($timeArray[$i] > $sigma * 2 + $mean)
         {
           $count = $count + 1;
         }
         if($count == 2)
         {
           echo "Second true\n";
           return TRUE;
         } 
       }
       // see if 4 of last 5 are beyond 1 sigma
       $count = 0;
       for($i = self::NUMBEROFTIMESINARRAY - 5; $i < self::NUMBEROFTIMESINARRAY; 
               $i++)
       {
         if($timeArray[$i] > $sigma + $mean)
         {
           $count = $count + 1;
         }
         if($count == 4)
         {
           echo "Third true\n";
           return TRUE;
         } 
       }
       // see if last six points are increasing
       $lastValue = $timeArray[self::NUMBEROFTIMESINARRAY - 6];
       for($i = self::NUMBEROFTIMESINARRAY - 5; $i < self::NUMBEROFTIMESINARRAY; 
               $i++)
       {
         /*if($lastValue == 0)
         {
           $lastValue = $timeArray[$i];
         }*/
         if($timeArray[$i] > $lastValue) 
         {
           $lastValue = $timeArray[$i];
         }
         else
         {
           break;
         }
         if($i == self::NUMBEROFTIMESINARRAY - 1)
         {
           echo "Fourth true\n";
           return TRUE;
         } 
       }
       //return TRUE;
       return FALSE;
    }

    public function calculateProcessTimeFromSensorOnTime($onTime, $carNumber)
    {
      //$this -> currentCarNumber = $carNumber;

      if($this -> previousSensor != null)
      {
        $stationOnTime = $this -> previousSensor -> getOutOfOffTimeArray($carNumber);
        if($stationOnTime != 0)
        {
          $stationOffTime = $onTime;
          $processTime = $stationOffTime - $stationOnTime;
          $this -> previousSensor -> setInOffTimeArray($carNumber, 0);
          $this -> nextSensor -> setInOnTimeArray($carNumber, 0);
          if($this -> stationNumber == 3)
          {
            echo "Station on time: ".$stationOnTime."\n";
            echo "Station off time: ".$stationOffTime."\n";
            echo "1.Process Time for car ".$carNumber.": ".$processTime."\n";
          }
          $this -> addProcessTime($processTime, $carNumber);
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
          //echo "This on time: ".$onTime."\n";
          //echo "Last on time: ".$this -> nextSensor -> getOutOfOnTimeArray($carNumber - 1)."\n";
          $processTime = $onTime - $this -> nextSensor -> getOutOfOnTimeArray($carNumber - 1);
          $this -> nextSensor -> setInOnTimeArray($carNumber - 1,0); // this might be wrong
          echo "3.Process Time for car ".$carNumber.": ".$processTime."\n";
        }
        $this -> addProcessTime($processTime, $carNumber);
      }
      
    }

    public function calculateProcessTimeFromSensorOffTime($offTime, $carNumber)
    {
      //$this -> currentCarNumber = $carNumber;
      if($this -> stationNumber != 5)
      {
        $stationOffTime = $this -> nextSensor -> getOutOfOnTimeArray($carNumber);
        if($stationOffTime != 0)
        {
          $stationOnTime = $offTime;
          $processTime = $stationOffTime - $stationOnTime;
          $this -> previousSensor -> setInOffTimeArray($carNumber,0);
          $this -> nextSensor -> setInOnTimeArray($carNumber , 0);
          echo "4.Process Time for car ".$carNumber.": ".$processTime."\n";
          $this -> addProcessTime($stationOnTime, $carNumber);
        }
      }
    }

    public function setLastDefectTime($newLastDefectTime)
    {
      $this -> lastDefectTime = $newLastDefectTime;
      $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> stationNumber, "time_since_defect",  $newLastDefectTime);
      $this -> overallStation -> updateDefectTimes($newLastDefectTime, $this -> stationNumber);
    }

    public function getLastDefectTime()
    {
       return $this -> lastDefectTime;
    }

    public function updateOverallDefectCount($newDefectsCount)
    {
      $this -> overallStation -> updateTotalDefectCount($newDefectsCount);
    }

  }
?>
