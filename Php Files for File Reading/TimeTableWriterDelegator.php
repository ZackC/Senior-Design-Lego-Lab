<?php
  class TimeTableWriterDelegator extends TableWriterDelegator
  {
  	public function __construct()
  	{
  		parent::__construct();
  	}

  	public function writeTableObjectToTable($tableObject,$sensorInformation)
  	{
		//echo "tablewriter: ".$this->tableWriter."\n";
  		$this -> tableWriter -> readTimeTableObject($tableObject,$stationInformation);
                echo "Calling writeTimesToTable\n";
                $this -> tableWriter -> writeTimesToTable();
  		//$this -> tableWriter -> calculateIdleTime($tableObject);
  		//$this -> tableWriter -> writeAverageIdleTimeToTable();
                //$this -> tableWriter -> closeConnection();
  	}
  }
?>
