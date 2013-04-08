<?php
  class TimeTableWriterDelegator extends TableWriterDelegator
  {
  	public function __construct($newTableWriter)
  	{
  		parent::__construct($newTableWriter);
  	}

  	public function writeTableObjectToTable($tableObject, $sensorInformation)
  	{
		//echo "tablewriter: ".$this->tableWriter."\n";
  		$this -> tableWriter -> readTimeTableObject($tableObject);
                echo "Calling writeTimesToTable\n";
                $this -> tableWriter -> writeTimesToTable();
                $sensorInformation -> updateSensor($tableObject -> getOnTime(), $tableObject -> getOffTime());
  		//$this -> tableWriter -> calculateIdleTime($tableObject);
  		//$this -> tableWriter -> writeAverageIdleTimeToTable();
                //$this -> tableWriter -> closeConnection();
  	}
  }
?>
