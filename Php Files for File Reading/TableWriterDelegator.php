<?php
function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
  
 abstract class TableWriterDelegator
 {
 	
   protected $tableWriter;
 	
   public function __construct($newTableWriter)
   {
     echo "In parent constructor\n";
     $this -> tableWriter = $newTableWriter;
     //echo "Table Writer in parent: ".$this -> tableWriter."\n";
   }
  
  abstract public function writeTableObjectToTable($tableObject, $sensorInformation);
 }
?>
