<?php
function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
  
class DefectTableWriterDelegator extends TableWriterDelegator
{
   
        //private $totalDefectCount = 0;

	public function __construct($newTableWriter)
	{
		parent::__construct($newTableWriter);
	}
	
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
