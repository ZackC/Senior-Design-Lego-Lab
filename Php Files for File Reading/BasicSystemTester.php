<?php
  $fw = new FileWatcher(1,realpath(dirname(__FILE__))."/Cell1Station1Time");
  $fw -> watchDirectoryForSimilarFiles();
  $tableObject = $fw -> getTableObject();
  echo $tableObject -> getCellNumber()."\n";
  echo $tableObject -> getStationNumber()."\n";
  echo $tableObject -> getFileTime()."\n";
  echo $tableObject -> getOnTime()."\n";
  echo $tableObject -> getOffTime()."\n";

  $tw = new TableWriter();
  $tw -> readTimeTableObject($tableObject);
  $tw -> calculateIdleTime($tableObject);
  $tw -> writeAverageIdleTimeToTable();
?>
