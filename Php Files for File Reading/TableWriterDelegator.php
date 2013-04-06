<?php
 abstract class TableWriterDelegator
 {
 	
   protected $tableWriter;
 	
   public function __construct()
   {
     echo "In parent constructor\n";
     $this -> tableWriter = new TableWriter();
     //echo "Table Writer in parent: ".$this -> tableWriter."\n";
   }
  
  abstract public function writeTableObjectToTable($tableObject, $sensorInformation);
 }
?>
