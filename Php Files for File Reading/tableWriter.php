<?php
class tableWriter
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
	
	private $average_process_time = 11;
	private $average_idle_time = 22;
	
	public function __construct()
	{
		$this->con = mysqli_connect($this->dbHost, $this->dbUsername, $this->dbPass, $this->dbName);
	}
	
	public function readTableObject($tableObject)
	{
		$this->fileTime = $tableObject->getFileTime();
		$this->cellNumber = $tableObject->getCellNumber();
		$this->stationNumber = $tableObject->getStationNumber();
		$this->onTime = $tableObject -> getOnTime();
		$this->offTime = $tableObject -> getOffTime();
	}
	
	public function calculateIdleTime($tableObject)
	{
		$this -> average_idle_time = $this -> offTime - $this -> onTime;
		
	}
	
	public function writeToTable()
	{
		$stations = mysqli_query($this->con, "SELECT * FROM station WHERE cell = $this->cellNumber AND station = $this->stationNumber");
		$stationRow = mysqli_fetch_array($stations);
		$stationId = $stationRow['station_id'];
		mysqli_query($this->con, "UPDATE latest_info SET average_idle_time = $this->average_idle_time WHERE station = $stationId");
	}
}
?>
