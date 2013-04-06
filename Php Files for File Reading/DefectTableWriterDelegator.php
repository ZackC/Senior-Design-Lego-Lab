<?php
class DefectTableWriterDelegator extends TableWriterDelegator
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function writeTableObjectToTable($tableObject,$sensorInformation)
	{
		$this -> tableWriter -> readDefectTableObject($tableObject,$stationInformation);
		$this -> tableWriter -> writeDefectsToTable();
                //$this -> tableWriter -> closeConnection();
	}
	
}
?>
