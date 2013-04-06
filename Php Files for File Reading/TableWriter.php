<?php
class TableWriter
{
	//Database Information
	private $dbHost = "localhost";
	private $dbUsername = "admin";
	private $dbPass = "";
	private $dbName = "seniorDesign";
	private $con;
	private $fileTime;
	private $cellNumber;
	private $stationNumber;
	private $onTime;
	private $offTime;
        private $defectLocations;
	private $runNumber = 1;
	private $processTime;
        private $idleTime;
	private $average_process_time;
	private $average_idle_time = 22;
        private $stationInformation;
        //private $currentType;
	
	public function __construct()
	{
		$this->con = mysqli_connect($this->dbHost, $this->dbUsername, $this->dbPass, $this->dbName);
	}
	
	public function readTimeTableObject($tableObject,$newStationInformation)
	{
		$this->fileTime = $tableObject->getFileTime();
		$this->cellNumber = $tableObject->getCellNumber();
		$this->stationNumber = $tableObject->getStationNumber();
		$this->onTime = $tableObject -> getOnTime();
		$this->offTime = $tableObject -> getOffTime();
                $this-> stationInformation = $newStationInformation;
                //$this-> currentType = 1;
	}

    public function readDefectTableObject($tableObject,$newStationInformation)
    {
        $this->fileTime = $tableObject->getFileTime();
	$this->cellNumber = $tableObject->getCellNumber();
	$this->stationNumber = $tableObject->getStationNumber();
        $this->defectLocations = $tableObject->getDefects();
        $this->stationInformation = $newStationInformation;
        $this -> currentType = 0;
    }
	
	public function calculateIdleTime()
	{
                if($this -> stationNumber == 1)
                {
                  return 0;
                }
                else
                {
		  $this -> idleTime = $this -> offTime - $this -> onTime;
                }
	}
	
	public function calculateProcessTime()
	{
		$stationId = $this -> getStationId();
		if($this -> stationNumber > 1)
		{
                  $stationId = $stationId - 1;
                  $carNumber = $this -> stationInformation -> getTimeFileCarNumber();
		  $result = mysqli_query($this -> con,"SELECT off_time, MAX(timestamp) FROM time WHERE station=$stationId AND car_number = $carNumber");
		  if(mysqli_num_rows($result) > 0)
		  {
		    $resultRow = mysqli_fetch_array($result);
                    $lastOffTime = $resultRow['off_time'];
		    $this -> processTime = $this -> onTime - $lastOffTime;
		  }
		  else 
		  {
		    $this -> processTime = 0;	
		  }
		}
		else
		{
			
		  $this -> processTime = $this -> onTime - $lastOffTime;
		}
                $result -> close;   
	}

    public function updateNextStationsProcessTime()
    {
      $stationId = $this -> getStationId();
      if($this -> stationNumber < 5)
    }

    public function writeDefectsToTable()
    {
      $stationId = $this -> getStationId();
      $defectCount = count($this -> defectLocations);
      $carNumber = $this -> stationInformation -> getTimeFileCarNumber();
      for($i = 0; $i < $defectCount; $i++)
      {
         $defect = $this->defectLocations[$i];
         echo "INSERT INTO defect(defect_id,run,station,location,timestamp,car_number) 
             		VALUES (NULL,$this->runNumber,$stationId,$defect,$this->fileTime,$carNumber)\n";
         mysqli_query($this->con, "INSERT INTO defect(defect_id,run,station,location,timestamp, car_number) 
             		VALUES (NULL,$this->runNumber,$stationId,$defect,$this->fileTime,$carNumber)");
      }
      $defectCount = $this -> getDefectCountOfStation() + $defectCount;
      echo "UPDATE latest_info SET daily_defect = $defectCount WHERE station = $stationId\n";
      mysqli_query($this->con, "UPDATE latest_info SET daily_defect = $defectCount WHERE station = $stationId");

       mysqli_query($this->con, "UPDATE latest_info SET status = 4 WHERE station = $stationId");
    }
    

    public function writeTimesToTable()
    {
      echo "In writeTimesToTable\n";
      $stationId = $this -> getStationId();
      $carNumber = $this -> stationInformation -> getTimeFileCarNumber();
      echo "INSERT INTO time(time_id,run,station,on_time,off_time,process_time,idle_time,timestamp, car_number) 
             		VALUES (NULL,".$this->runNumber.",".$stationId.",".$this->onTime.", ".$this->offTime.", 0, ".$this -> calculateIdleTime().", ".$this->fileTime.",".$carNumber.")";
      mysqli_query($this->con, "INSERT INTO time(time_id,run,station,on_time,off_time,process_time,idle_time,timestamp,car_number) 
             		VALUES (NULL,".$this->runNumber.",".$stationId.",".$this->onTime.", ".$this->offTime.", 0, ".$this -> calculateIdleTime().", ".$this->fileTime.",".$carNumber.")\n");
    }

    public function getDefectCountOfStation()
    {
    	$stationId = $this -> getStationId();
        $queryResult = mysqli_query($this -> con, "SELECT * FROM latest_info WHERE station = $stationId") or die(" Unable to perform defect count query");
    	$stationRow = mysqli_fetch_array($queryResult);
    	return $stationRow['daily_defect'];
    }
    
    public function getStationId()
    {
    	$stations = mysqli_query($this->con, "SELECT * FROM station WHERE cell = $this->cellNumber AND station = $this->stationNumber");
    	echo "Cell Number: ".$this->cellNumber."\n";
    	echo "Station Number: ".$this->stationNumber."\n";
    	$stationRow = mysqli_fetch_array($stations);
        $stations -> close();
    	$stationId = $stationRow['station_id'];
    	return $stationId;
    }
	
	public function writeAverageIdleTimeToTable()
	{
          $stationId = $this -> getStationId();
          echo "Stations: ".$stationId."\n";
          echo "Average Idle Time: ".$this->average_idle_time."\n"; 
          echo "Database String: "."UPDATE latest_info SET average_idle_time = $this->average_idle_time WHERE station = $stationId"."\n";
	  mysqli_query($this->con, "UPDATE latest_info SET average_idle_time = $this->average_idle_time WHERE station = $stationId");
	}
	
	public function extractBottleneckStation()
	{
	    $queryResult = mysqli_query($this -> con, "SELECT station, MAX(process_time) from time");
	    $stationRow = mysqli_fetch_array($queryResult);
            $queryResult -> close()
	    return $stationRow['station'];
	}

        public function closeConnection()
        {
           $this -> con -> close();
        }
	
}
?>
