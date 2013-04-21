<?php
function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
  
/**
 *
 * The class for the abstract class for delegating information from the 
 * from the files
 *
 */
 abstract class TableWriterDelegator
 {
   //the object for writing to the database	
   protected $tableWriter;
 	
   //the constructor for the class that sets the table writer
   public function __construct($newTableWriter)
   {
     echo "In parent constructor\n";
     $this -> tableWriter = $newTableWriter;
     //echo "Table Writer in parent: ".$this -> tableWriter."\n";
   }
  
  //the abstract function for writing the table object information to the table writer and the sensor
  abstract public function writeTableObjectToTable($tableObject, $sensorInformation);
 }
?>
