<?php
/*function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
*/  
   /*
    * This class sets up the lab and creates a file watcher for each file.
    *
    */


  function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
   //$pathStart = '/home/legolab/LEGOLABHAHA';
   $pathStart = dirname(__FILE__);
   $directory = realpath($pathStart);
        //echo "Directory: ".$directory."\n";
  $directoryContents = scandir($directory) or die("Unable to read directory\n"); // may need to make a softer error handling later
  //This for loop deletes all of the files in the directory.  Useful for testing
  //but will probably not be in the final product.
  /*for($i = 0; $i < count($directoryContents); i++)
  {
    unlink($directoryContens[i]);
  }*/
  $tableWriter = new TableWriter();
  $labInit = new LabInitialization();
  $sensorTable = $labInit -> setUpLab($tableWriter);
  $tableWriter -> resetLatestInfo();
  $fileWatcherArray = array();
  
  $fileWatcherArray[] = new FileWatcher(1, $pathStart."/Cell1Sensor1TimeData",$sensorTable[0],$tableWriter);
  $fileWatcherArray[] = new FileWatcher(1, $pathStart."/Cell1Sensor2TimeData",$sensorTable[1],$tableWriter);
  $fileWatcherArray[] = new FileWatcher(1, $pathStart."/Cell1Sensor3TimeData",$sensorTable[2],$tableWriter);
  $fileWatcherArray[] = new FileWatcher(1, $pathStart."/Cell1Sensor4TimeData",$sensorTable[3],$tableWriter);
  $fileWatcherArray[] = new FileWatcher(1, $pathStart."/Cell1Sensor5TimeData",$sensorTable[4],$tableWriter);
  $fileWatcherArray[] = new FileWatcher(0, $pathStart."/Cell1Sensor1DefectResults",$sensorTable[0],$tableWriter);
  $fileWatcherArray[] = new FileWatcher(0, $pathStart."/Cell1Sensor2DefectResults",$sensorTable[1],$tableWriter);
  $fileWatcherArray[] = new FileWatcher(0, $pathStart."/Cell1Sensor3DefectResults",$sensorTable[2],$tableWriter);
  $fileWatcherArray[] = new FileWatcher(0, $pathStart."/Cell1Sensor4DefectResults",$sensorTable[3],$tableWriter);
  $fileWatcherArray[] = new FileWatcher(0, $pathStart."/Cell1Sensor5DefectResults",$sensorTable[4],$tableWriter);

  $fileWatcherArraySize = count($fileWatcherArray);
  //$directoryContents = scandir($directory);
  //$oldDirectoryContentsSize = count($directoryContents);  
  while(true)
  {

       //while($this -> getRunning())
       //{
       $newDirectoryContents = scandir($directory);
       //echo "Old Directory Size: ".$oldDirectoryContentsSize."\n";
       //echo "New Directory Size: ".count($newDirectoryContents)."\n";
      // if($oldDirectoryContentsSize != count($newDirectoryContents))
      // {
  	 for($i = 0; $i < $fileWatcherArraySize; $i++)
  	 {
  		$fileWatcherArray[$i] -> processSimilarFiles($newDirectoryContents);
  	 }
      //   $oldDirectoryContentsSize = count(scandir($directory));
         //break;
      // }	
  }
  echo "Done\n";
?>
