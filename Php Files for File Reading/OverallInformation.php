<?php
/*function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }
  spl_autoload_register('my_autoloader');*/
  
   /**
    *
    * The class that stores the information of the overall stations
    */
   class OverallInformation
   {
     // the array for the total times of all the stations for each car
     // used in calculating the overall accumulatedTotalTime
     private $overallTime = array();
     // the station of the bottleneck station
     private $bottleneckStationNumber;
     // the array used to hold the information for the bottleneck station
     private $bottleneckArray = array();
     // the value storing the average process time for all of the different stations
     private $averageProcessTime;
     // the value storing the average idle time for all of the different stations
     private $averageIdleTime;
     //private $averageDefectTime;
     //the array that is storing the process times for all the stations
     private $averageProcessTimeArray = array();
     //the array that is sotring the average idle times for all the stations
     private $averageIdleTimeArray = array();
     // the accumulations of all of the total times
     private $accumulatedTotalTime = 0;
     // the count of all of the total times
     private $accumulatedTotalTimeCount = 0;
     // the station number for the overall station
     private $overallStationNumber = 0;
     // the cell number for the station
     private $cellNumber = 1;
     // the object writing to the database
     private $tableWriter;
      
     //const STATIONNUMBER = 0;
     //the number of times kept in the arrays
     const NUMBEROFTIMESKEPT = 20;
     //the stations per cell
     private $stationsPerCell;
     //the array of the statuses of the stations
     private $statusArray = array();
     //the array of the total defects of each station
     private $defectTimeArray = array();
     //the total defect count
     private $totalDefectCount = 0;
     //the graphing object
     private $grapher;
     //the process time array that is being graphed
     private $processTimesForGraph = array();
     //the amount of points in the process times
     private $countOfProcessTimesForGraph = 0;
     //the mean of the process times
     const PROCESSMEAN = 71;
     //standard deviation of the process times
     const PROCESSSIGMA = 19;
     //the points for the idle time graph
     private $idleTimesForGraph = array();
     //the count of the points in the idle time graph
     private $countOfIdleTimesForGraph = 0;
     //the mean of the idle times
     const IDLEMEAN = 8;
     //the standard deviation of the idle times
     const IDLESIGMA = 2;
     //the number of times stored for the graphs
     const NUMBEROFTIMESINARRAY = 10;
     
    /*
     * The constructor for the overall station 
     * newStationsPerCell - the number of stations per cell
     * newTableWriter - the object writing to the database
     * newGrapher - the object making graphs
     */
     public function __construct($newStationsPerCell, $newTableWriter, $newGrapher)
     {
       $this -> stationsPerCell = $newStationsPerCell;
       $this -> overallTime = array_pad($this -> overallTime, self::NUMBEROFTIMESKEPT, 0);
       $this -> averageProcessTimeArray = array_pad($this -> averageProcessTimeArray, $newStationsPerCell, 0);
       $this -> averageIdleTimeArray = array_pad($this -> averageIdleTimeArray, $newStationsPerCell, 0);
       unset($this -> averageIdleTimeArray[0]);
       $this -> bottleneckArray = array_pad($this -> bottleneckArray, $newStationsPerCell, 0);
       $this -> tableWriter = $newTableWriter;
       $this -> statusArray = array_pad($this -> statusArray, $newStationsPerCell, 1);
       $this -> defectTimeArray = array_pad($this -> defectTimeArray, $newStationsPerCell,0);
       $this -> grapher = $newGrapher;
     }

     //updates the average process time 
     //$processTime - the new process time
     //$stationNubmer - the number where the process time came from
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

    /*
     * Updates the updates the different mean times and puts the time in the latest
     * time array
     * $newTimeValue - the time to put in the array
     * $stationNumber - the station that the time is for
     * $array - the array of the station's times
     * $averageTime - the specific average time to update 
     */
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

     //updates the total time for the for a car
     //carNumber - the car whose time to update
     //timeAmount - the time amount to add to the total time count
     //stationNumber - the number of the station where the time came from
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
     
     //updates the status for the overall station by selecting
     //the most critical status from the group
     public function updateStatus($newStatus, $stationNumber)
     {
        $this -> statusArray[$stationNumber - 1] = $newStatus; 
        $status = max($this -> statusArray);
        $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> overallStationNumber, "status", $status); 
     }
   
     //updates the defect time for a station
     public function updateDefectTimes($newDefectTime, $stationNumber)
     {
       //$this -> defectTimeArray[$stationNumber - 1] = $newDefectTime;
       //$lastDefectTime = max($this -> defectTimeArray);
       //$this -> tableWriter -> writeToTable($this -> cellNumber, $this -> overallStationNumber, "time_since_defect", $lastDefectTime);
       $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> overallStationNumber, "time_since_defect", $newDefectTime); 
     }
     
     //updates the total defect count with the
     //newDefectCount to be added to the total defect count
     public function updateTotalDefectCount($newDefectsCount)
     {
       $this -> totalDefectCount = $this -> totalDefectCount + $newDefectsCount;
       $this -> tableWriter -> writeToTable($this -> cellNumber, $this -> overallStationNumber, "daily_defect", $this -> totalDefectCount); //0 for updating the overall station
     }

    /*
     * This function creates new graphs for the overall station
     *
     */
     public function updateGraphs()
     {
         $this -> addTimePoint($this -> averageProcessTime, $this -> countOfProcessTimesForGraph, $this -> processTimesForGraph);
         $this -> grapher -> makeGraph($this -> processTimesForGraph, self::PROCESSMEAN, self::PROCESSMEAN + 3 * self::PROCESSSIGMA, "Average Process Times", "Cell1OverallProcessGraph.png");
         $this -> addTimePoint($this -> averageIdleTime, $this -> countOfIdleTimesForGraph, $this -> idleTimesForGraph);
         $this -> grapher -> makeGraph($this -> idleTimesForGraph, self::IDLEMEAN, self::IDLEMEAN + 3 * self::IDLESIGMA, "Average Idle Times", "Cell1OverallIdleGraph.png");
     }

    //This function handles adding tiem points to that arrays that will be graphed
    //time - the time to add to the graph
    //countOfTimeArrayPoints - the count of the time points in the array
    //timeArray - the time array to add the point to.
    public function addTimePoint($time,&$countOfTimeArrayPoints,&$timeArray)
    {

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

   }
?>
