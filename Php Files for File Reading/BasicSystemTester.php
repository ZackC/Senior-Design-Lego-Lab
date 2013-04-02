<?php
function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');

  $fw = new FileWatcher(1,realpath(dirname(__FILE__))."/Cell1Station1Time");
  $fw -> watchDirectoryForSimilarFiles();
  $tableObject = $fw -> getTableObject();
  echo $tableObject -> getCellNumber()."\n";
  echo $tableObject -> getStationNumber()."\n";
  echo $tableObject -> getFileTime()."\n";
  echo $tableObject -> getOnTime()."\n";
  echo $tableObject -> getOffTime()."\n";

  $tw = new TableWriter();
  $tw -> readTableObject($tableObject);
  $tw -> calculateIdleTime($tableObject);
  $tw -> writeToTable();
?>
