<?php 
/**
 *
 * The class for writing to the mysql database
 *
 */ 
class TableWriter
{
	//Database Information
        
        //the database location
	private $dbHost = "localhost";
        //the user for the database
	private $dbUsername = "LegoLab";
        //the password for the user
	private $dbPass = "";
        //the name of the database
	private $dbName = "legolab";
	
        //the database connection object
	private $con;
        //the current run number
	private $runNumber = 1;
	
        //the time of the file
	private $fileTime;
        //the cell number of the file
	private $cellNumber;
        //the station number of the file
	private $stationNumber;
        //the sensor number of the file
	private $sensorNumber;
        //the on time from the file
	private $onTime;
        //the off time from the file
	private $offTime;
        //the defects locations in the file
        private $defectLocations;
	
        //this method connects to the database, resets the values that are displayed,
        //and calculates the run number
	public function __construct()
	{
		$this->con = mysqli_connect($this->dbHost, $this->dbUsername, $this->dbPass, $this->dbName);
		$runs = mysqli_query($this->con, "SELECT * FROM run ORDER BY run_id DESC LIMIT 1");
		if($runs)
		{
			echo "Found run value in database.\n";
			$runRow = mysqli_fetch_array($runs);
			$this->runNumber = $runRow['run_id'];
			$this->runNumber = $this -> runNumber + 1;
		}
		date_default_timezone_set('America/Chicago');
		$time = date("YmdHis");
		$run = $this -> runNumber;
		echo "Run time start is: ".$time."\n";
		mysqli_query($this -> con, "INSERT INTO run(run_id, start, stop) VALUES ($run,$time,0)") or die("Unable to write run information.\nINSERT INTO run(run_id, start, stop) VALUES ($run,$time,0)\n"); //will need to change to softer error handling later but used for testing now.
	}
	
        //writes to the latest info table
        //it writes the station decided by cellNumber and stationNumber
        //it writes the information in columnvalue to the column with the name columnName
	public function writeToTable($cellNumber, $stationNumber, $columnName, $columnValue)
	{
                echo "In write to table.\n";
		$this->cellNumber = $cellNumber;
		$this->stationNumber = $stationNumber;
		$stationId = $this->getStationId();
		//$info = mysqli_query($this->con, "SELECT * FROM latest_info WHERE station = $stationId");
		//$row = mysqli_fetch_array($info);
                echo "UPDATE latest_info SET $columnName = $columnValue WHERE station = $stationId\n";
		mysqli_query($this->con, "UPDATE latest_info SET $columnName = $columnValue WHERE station = $stationId");
	}
	
	//reads the information from the time table object
	public function readTimeTableObject($tableObject)
	{
		$this->fileTime = $tableObject->getFileTime();
		$this->cellNumber = $tableObject->getCellNumber();
		$this->sensorNumber = $tableObject->getSensorNumber();
		$this->onTime = $tableObject->getOnTime();
		$this->offTime = $tableObject->getOffTime();
	}

    //reads the information from the defect table object
    public function readDefectTableObject($tableObject)
    {
        $this->fileTime = $tableObject->getFileTime();
		$this->cellNumber = $tableObject->getCellNumber();
		//$this->stationNumber = $tableObject->getStationNumber();
		$this->sensorNumber = $tableObject->getSensorNumber();
        $this->defectLocations = $tableObject->getDefects();
    }

    //writes defect information to the defect table
    public function writeDefectsToTable()
    {
        echo "In write defects to Table.\n";
    	$stationId = $this->getStationId();
    	$defectCount = count($this->defectLocations);
        for($i = 0; $i < $defectCount; $i++)
        {
           $defect = $this->defectLocations[$i];
           mysqli_query($this->con, "INSERT INTO defect(defect_id,run,sensor,location,timestamp) 
             		VALUES (NULL,$this->runNumber,$this->sensorNumber,$defect,$this->fileTime)");
        }
        $defectCount = $this->getDefectCountOfStation() + $defectCount;
        mysqli_query($this->con, "UPDATE latest_info SET daily_defect = $defectCount WHERE station = $stationId");
        mysqli_query($this->con, "UPDATE latest_info SET time_since_defect = ".$this -> fileTime." WHERE station = $stationId");
        //mysqli_query($this->con, "UPDATE latest_info SET status = 4 WHERE station = $stationId");
    }
    
    //writes time information to the time table
    public function writeTimesToTable()
    {
      echo "In write times to table.\n";
      mysqli_query($this->con, "INSERT INTO time(time_id,run,sensor,on_time,off_time,timestamp) 
             		VALUES (NULL,$this->runNumber,$this->sensorNumber,$this->onTime,$this->offTime,$this->fileTime)");
      echo "INSERT INTO time(time_id,run,sensor,on_time,off_time,timestamp) 
             		VALUES (NULL,$this->runNumber,$this->sensorNumber,$this->onTime,$this->offTime,$this->fileTime)\n";
    }

    //returns the defect count of the current station
    public function getDefectCountOfStation()
    {
        echo "In get defect count of station.\n";
    	$stationId = $this -> getStationId();
        $queryResult = mysqli_query($this -> con, "SELECT * FROM latest_info WHERE station = $stationId") or die(" Unable to perform defect count query");
    	$stationRow = mysqli_fetch_array($queryResult);
    	return $stationRow['daily_defect'];
    }
    
    //returns the station id in the table for the current station
    public function getStationId()
    {
    	$stations = mysqli_query($this->con, "SELECT * FROM station WHERE cell = $this->cellNumber AND station = $this->stationNumber") or die("Unable to extract station information at cell: ".$this ->cellNumber."and station: ".$this->stationNumber."\n");
    	$stationRow = mysqli_fetch_array($stations);
    	$stationId = $stationRow['station_id'];
    	return $stationId;
    }
    
    //resets the latest info table to their default values
    public function resetLatestInfo()
    {
    	date_default_timezone_set('America/Chicago');
    	$currentTime = date("His");
        echo "|$currentTime|\n";
    	mysqli_query($this->con, "UPDATE latest_info SET status = 1, average_process_time = 0, " .
    			"average_idle_time = 0, takt_time = 0, daily_defect = 0, time_since_defect = $currentTime, " .
    			"bottleneck = 0, error_type = 1");
    }
}
?>
