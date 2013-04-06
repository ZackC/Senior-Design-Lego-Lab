<?php
  class StationInformation
  {
    private $stationNumber
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
    private $countOfTimesInIdleTimes = 0;
    private $accumulatedIdleTime = 0;
    private $accumulatedIdleTimeCount = 0;
    private $averageIdleTime;
    private $currentCarNumber = 0;
    private $status = 1;
    private $tableWriter;
    private $grapher
    private $meanIdleTimeForStation;
    private $meanProcessTimeForStation;
    private $sigmaIdleTimeForStation;
    private $sigmaProcessTimeForStation;
    private const NUMBEROFTIMESINARRAY = 10;
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
    }


    public function addProcessTime($time)
    {
       $this -> addTimePoint($time, $this -> accumulatedProcessTimeCount, $this -> accumulatedProcessTime, $this -> countOfTimesInProcessTimes, $this -> processTimes);
       $this -> averageProcessTime = $this -> accumulatedProcessTime / $this -> accumulatedProcessTimeCount;
       $isOnAlert = $this -> isSystemOutOfControl($this -> processTimes, $this -> sigmaProcessTimeForStation;
       if(!$isOnAlert)
       {
         if($this -> processTimes[self::NUBMEROFTIMESINARRAY - 1] > 2 * $this -> sigmaProcesTimeForStation)
         {
           $isWarning = true;
         }
         else
         {
           $isWarning = false;
         }
       }
       //something to create graph and add information to tables here
    }

    public function addIdleTime($time)
    {
       $this -> addTimePoint($time, $this -> accumulatedIdleTimeCount, $this -> accumulatedIdleTime, $this -> countOfTimesInIdleTimes, $this -> idleTimes);
       $this -> averageIdleTime = $this -> accumulatedIdelTime / $this -> accumulatedProcessTimeCount;
       $isOnAlert = $this -> isSystemOutOfControl($this -> idleTimes, $this -> sigmaIdleTimeForStation;
       if(!$isOnAlert)
       {
         if($this -> idleTimes[self::NUBMEROFTIMESINARRAY - 1] > 2 * $this -> sigmaIdleTimeForStation)
         {
           $isWarning = true;
         }
         else
         {
           $isWarning = false;
         }
       }
     //something to create graphs and add informartion to tables here
    }

    private function addTimePoint($time,&$numberOfTimes,&$totalTime,&$countOfTimeArrayPoints,$timeArray)
    {
       $numberOfTimes = $numberOfTimes + 1;
       $totalTime = $totalTime + $time;
       //if full - remove then add
       if($countOfTimeArrayPoints  == self::NUBMEROFTIMESINARRAY)
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
      if($this -> currentCarNumber > $carNumber)
      {
        $this -> currentCarnumber = $carNumber;
        $this -> status -> $newStatus;
        //maybe something to update status in table here
      }
      else if($newStatus > $this -> status)
      {
        $this -> status = $newStatus;
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
             > $sigma * 3;
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

  }
?>
