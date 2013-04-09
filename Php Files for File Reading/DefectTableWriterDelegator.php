<?php
class DefectTableWriterDelegator extends TableWriterDelegator
{
	public function __construct($newTableWriter)
	{
		parent::__construct($newTableWriter);
	}
	
	public function writeTableObjectToTable($tableObject, $sensorInformation)
	{
		$this -> tableWriter -> readDefectTableObject($tableObject);
		$this -> tableWriter -> writeDefectsToTable();
                $this -> sensorInformation -> setLastDefectTime($this -> tableObject -> getFileTime());
                //$this -> tableWriter -> closeConnection();
	}
	
}
?>
