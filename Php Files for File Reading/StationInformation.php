<?php
  /*
   *  The class that holds the information for a station and performs the 
   *  calculations for the station.
   */
  class StationInformation
  {
    //the cell number of the station
    private $cellNumber = 1;
    //the number of this station in the cell
    private $stationNumber;
    //the station before this station
    private $previousStation;
    //the station after this station
    private $nextStation;
    //the sensor before this station
    private $previousSensor;
    //the sensor after this station 
    private $nextSensor;
    //the array storing the latest process times for graphing
    private $processTimes = array();
    //the count of the amount of times in the processTime graph
    private $countOfTimesInProcessTimes = 0;
    //the accumulation of the process times
    private $accumulatedProcessTime = 0;
    //the count of the times in the accumulated process times
    private $accumulatedProcessTimeCount = 0;
    //the average process time for the station
    private $averageProcessTime;
    //the idle times to graph
    private $idleTimes = array();
     //the idle times stored in a way that they can be used in the total time calculation
    private $idleTimesForTotalTime = array();
    //the last idle time for the station
    private $lastIdleTime;
    //the count of the times in the idle time array
    private $countOfTimesInIdleTimes = 0;
    //the accumulation of the idle time
    private $accumulatedIdleTime = 0;
    //the count of the times in the accumulation of the idle time
    private $accumulatedIdleTimeCount = 0;
    //the latest average idle time of the station
    private $averageIdleTime;
    //the current number of the car
    private $currentCarNumber = 0;
    //the status of the station, 1 is fine (green), 2 is warning (yellow), 3 is alert (red)
    // and 4 is defect (black)
    private $status = 1;
    //the database writer
    private $tableWriter;
    //the graphing object
    private $grapher;
    //the mean of the idle time for the station
    private $meanIdleTimeForStation;
    //the mean of the process time for the station
    private $meanProcessTimeForStation;
    //the standard deviation of the idle time for the station
    private $sigmaIdleTimeForStation;
    //the standard deviation of the process time for the station
    private $sigmaProcessTimeForStation;
    //the number of times being stored in the array
    const NUMBEROFTIMESINARRAY = 10;
    //the link to the overall station
    private $overallStation;
    //the time of the last defect for the station
    private $lastDefectTime;
    
    //the constructor
    //newStationNumber - the station number
    //newTableWriter - the database writer
    //newGrapher - the graphing object
    //newMeanIdleTime - the mean idle time for the station
    //newMeanProcessTime - the mean process time for the station
    //newSigmaIdleTime - the standard deviation of the idle time
    //newSigmaProcessTime - the standard deviation of the process time
    //newOverallStation - the link to the overall station
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

    //sets the station before this station
    public function setPreviousStation($newPreviousStation)
    {
       $this -> previousStation = $newPreviousStation;
    }
    
    //returns the station before this station
    public function getPreviousStation()
    {
    	return $this->previousStation;
    }

    //sets the station after this station
    public function setNextStation($newNextStation)
    {
       $this -> nextStation = $newNextStation;
    }
    
    //returns the station after this station
    public function getNextStation()
    {
    	return $this->nextStation;
    }

    //sets the sensor before the station
    public function setPreviousSensor($newPreviousSensor)
    {
       $this -> previousSensor = $newPreviousSensor;
    }
    
    //returns the sensor before the station
    public function getPreviousSensor()
    {
    	return $this->previousSensor;
    }

    //sets the sensor after the station
    public function setNextSensor($newNextSensor)
    {
       $this -> nextSensor = $newNextSensor;
       //echo "Setting next sensor\n";
    }

    //returns the sensor after the station
    public function getNextSensor()
    {
       return $this -> nextSensor;
    }

    //adds a process time for a specific carNumber and updates all the information 
    //the can be updated from the process time
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
       
       $this -> overallStation -> updateBottleNeckStation($totalStationTime, $this -> stationNumber);

       $this -> overallStation -> updateTotalTime($carNumber, $totalStationTime, $this -> stationNumber);
    }

    //adds the idle time to the for a specific car and updates all the information that can be updated from a new idle time
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

    //adds the time point to the array
    //$time - the time to add to the array
    //numberOfTimes - the number of times that have been added to the total time count
    //totalTime - the accumulated total time
    //countOfTimeArrayPoints - the count of the points in the array
    //timeArray - the aray of the latest time points
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

    //updates the status for the station 
    //it always updates if the car number is larger than the previous car number
    //newStatus - the status to change to
    //carNumber - the number of the car to update
    //timeErrorType - the type of the time error, 2 for process time error, 3 for idle
    //    time error
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

    //calculates the process time from the sensor on time (station off time)
    //as long as the station's on time is already known 
    public function calculateProcessTimeFromSensorOnTime($onTime, $carNumber)
    {
      //$this -> currentCarNumber = $carNumber;

      if($this -> previousSensor != null ) 
      {
        $stationOnTime = $this -> previousSensor -> getOutOfOffTimeArray($carNumber);
        if($stationOnTime != 0)
        {
          $stationOffTime = $onTime;
          echo "station on time: ".$stationOnTime."\n";
          echo "station off time: ".$stationOffTime."\n";
          $processTime = $stationOffTime - $stationOnTime;
          $this -> previousSensor -> setInOffTimeArray($carNumber, 0);
          if($this -> stationNumber == 5)
          {
             if($this -> nextSensor -> checkThenSetInOnTimeArray($carNumber, 0))
             {

               $this -> updateCycleTime($carNumber);
             }
          }
          else
          {
            echo "22222222222222222\n";
            $this -> nextSensor -> setInOnTimeArray($carNumber, 0);
          }
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

    //calculates the process time from sensor off time (station on time) if the off time for the station 
    //is already known
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
          echo "3333333333333333\n";
          $this -> nextSensor -> checkThenSetInOnTimeArray($carNumber, 0);
          //$this -> nextSensor -> setInOnTimeArray($carNumber , 0);
          echo "Station on time: ".$stationOnTime."\n";
          echo "Station off time: ".$stationOffTime."\n";
          echo "4.Process Time for car ".$carNumber.": ".$processTime."\n";
          $this -> addProcessTime($stationOnTime, $carNumber);
        }
      }
    }

    //sets the last defect time of the station, writes to the table
    //and updates the overall defect time
    public function setLastDefectTime($newLastDefectTime)
    {
      $this -> lastDefectTime = $newLastDefectTime;
      $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> stationNumber, "time_since_defect",  $newLastDefectTime);
      $this -> overallStation -> updateDefectTimes($newLastDefectTime, $this -> stationNumber);
    }

    //returns the time of the last defect for the station
    public function getLastDefectTime()
    {
       return $this -> lastDefectTime;
    }

    //This function updates the overall station's defect count.
    //it is just used to forward information to the overall information
    //class
    public function updateOverallDefectCount($newDefectsCount)
    {
      $this -> overallStation -> updateTotalDefectCount($newDefectsCount);
    }
  
    //This function updates the cycle time for the specific car number.
    //The cycle time is the difference of the on times at station 5
    //between cars.  It measures how often a car is being finished 
    public function updateCycleTime($carNumber)
    {
      if($this -> stationNumber == 5 && $carNumber > 1)
      {
        echo "^^^^^^^^^^^^^^^^^^^^\n";
        echo "Car number: ".$carNumber."\n";
        $startTime = $this -> nextSensor -> getOutOfOnTimeArray($carNumber);
        $stopTime = $this -> nextSensor -> getOutOfOnTimeArray($carNumber - 1);
        echo "Start time: ".$startTime."\n";
        echo "Stop time: ".$stopTime."\n";
        if($stopTime != 0)
        {
          $cycleTime = $startTime - $stopTime;
          echo "Cycle time: ".$cycleTime."\n";
          $this -> nextSensor -> checkThenSetInOnTimeArray($carNumber - 1 , 0);
          for($i = 1; $i < 6; $i++) //iterating through the stations, may want to find out how to not hard code while refactoring
          {
            $this -> tableWriter -> writeToTable($this -> cellNumber,$i, "takt_time", $cycleTime);
          }
        }
        $this -> overallStation -> updateGraphs();
      }
    }

  }
?>
