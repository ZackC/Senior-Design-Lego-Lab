<?php
/*
function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
 */ 

/**
 *
 *  The class that handles sending the information from the
 *  defect files to the correct places
 */
class DefectTableWriterDelegator extends TableWriterDelegator
{
   
        //private $totalDefectCount = 0;

        // the default constructor
        // newTableWriter - the defect table writer
	public function __construct($newTableWriter)
	{
		parent::__construct($newTableWriter);
	}
	
        /**
         *
         * Handles sending the information to the table and to the correct sensor 
         * methods.
         */
	public function writeTableObjectToTable($tableObject, $sensorInformation)
	{
		$this -> tableWriter -> readDefectTableObject($tableObject);
		$this -> tableWriter -> writeDefectsToTable();
                $sensorInformation -> setLastDefectTime($tableObject -> getFileTime());
                $sensorInformation -> passDefectCount(count($tableObject -> getDefects()));
                
                //$this -> tableWriter -> closeConnection();
	}
	
}
?>
