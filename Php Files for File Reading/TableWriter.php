<?php
class TableWriter
{
	//Database Information
	private $dbHost = "localhost";
	private $dbUsername = "admin";
	private $dbPass = "";
	private $dbName = "test";
	
	private $con;
	private $runNumber = 1;
	
	private $fileTime;
	private $cellNumber;
	private $stationNumber;
	private $sensorNumber;
	private $onTime;
	private $offTime;
    private $defectLocations;
	
	public function __construct()
	{
		$this->con = mysqli_connect($this->dbHost, $this->dbUsername, $this->dbPass, $this->dbName);
		$runs = mysqli_query($this->con, "SELECT * FROM run ORDER BY run_id DESC");
		$runRow = mysqli_fetch_array($runs);
		if ($runRow)
		{
			$this->runNumber = $runRow['run_id'];
		}
	}
	
	public function writeToTable($cellNumber, $stationNumber, $columnName, $columnValue)
	{
		$this->cellNumber = $cellNumber;
		$this->stationNumber = $stationNumber;
		$stationId = $this->getStationId();
		$info = mysqli_query($this->con, "SELECT * FROM latest_info WHERE station = $stationId");
		$row = mysqli_fetch_array($info);
		mysqli_query($this->con, "UPDATE latest_info SET $columnName = $columnValue WHERE station = $stationId");
	}
	
	
	public function readTimeTableObject($tableObject)
	{
		$this->fileTime = $tableObject->getFileTime();
		$this->cellNumber = $tableObject->getCellNumber();
		$this->sensorNumber = $tableObject->getSensorNumber();
		$this->onTime = $tableObject->getOnTime();
		$this->offTime = $tableObject->getOffTime();
	}

    public function readDefectTableObject($tableObject)
    {
        $this->fileTime = $tableObject->getFileTime();
		$this->cellNumber = $tableObject->getCellNumber();
		$this->stationNumber = $tableObject->getStationNumber();
		$this->sensorNumber = $tableObject->getSensorNumber();
        $this->defectLocations = $tableObject->getDefects();
    }

    public function writeDefectsToTable()
    {
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

        mysqli_query($this->con, "UPDATE latest_info SET status = 4 WHERE station = $stationId");
    }
    

    public function writeTimesToTable()
    {
      mysqli_query($this->con, "INSERT INTO time(time_id,run,sensor,on_time,off_time,timestamp) 
             		VALUES (NULL,$this->runNumber,$this->sensorNumber,$this->onTime,$this->offTime,$this->fileTime");
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
    	$stationRow = mysqli_fetch_array($stations);
    	$stationId = $stationRow['station_id'];
    	return $stationId;
    }
}
?>
