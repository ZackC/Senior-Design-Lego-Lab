<?php
/*function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
  */

  /**
   *
   * The object that handles the 
   *
   */
  class TimeTableWriterDelegator extends TableWriterDelegator
  {
        //the constructor for the class
        //newTableWriter - the object that writes to the database
  	public function __construct($newTableWriter)
  	{
  		parent::__construct($newTableWriter);
  	}

        // the function for sending the time infrmation to the right place
        // it sends the information to the table writer and to the sensor information class
        //tableObject - the object storing the information
        //sensorInformation - the sensor to send the information to
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
