<?php
class DefectTableWriterDelegator extends TableWriterDelegator
{
   
        private $totalDefectCount = 0;

	public function __construct($newTableWriter)
	{
		parent::__construct($newTableWriter);
	}
	
	public function writeTableObjectToTable($tableObject, $sensorInformation)
	{
		$this -> tableWriter -> readDefectTableObject($tableObject);
		$this -> tableWriter -> writeDefectsToTable();
                $this -> sensorInformation -> setLastDefectTime($this -> tableObject -> getFileTime());
                $this -> totalDefectCount = $this -> totalDefectCount + count($tableObject -> getDefects());
                $this -> tableWriter -> writeToTable($tableObject -> getCellNumber(), 0, "daily_defect", $totalDefectCount); //0 for updating the overall station
                //$this -> tableWriter -> closeConnection();
	}
	
}
?>
