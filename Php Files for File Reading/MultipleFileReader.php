<?php
   /*
    * This class is used to start the system and create a process that will watch each
    * file.  This may change depeding on how the other group does the file system but
    * this should be a good start.  
    *
    * And it might be better to use one process with multiple file watchers and just loop 
    * through each of them checking the file instead of having multiple processes.  Will  
    * need to talk to team about it.
    */
   //This class is not ready yet but will be used to watch multiple files.
   //also forking may by different on different operating systems.
   /*
  $childrenArray;
  $numberOfChildProcesses = 10;
  $filesForChildren[0]=realpath(dirname(__FILE__))."/Station1TimeData.txt\n";
  $filesForChildren[1]=realpath(dirname(__FILE__))."/Station2TimeData.txt\n";
  $filesForChildren[2]=realpath(dirname(__FILE__))."/Station3TimeData.txt\n";
  $filesForChildren[3]=realpath(dirname(__FILE__))."/Station4TimeData.txt\n";
  $filesForChildren[4]=realpath(dirname(__FILE__))."/Station5TimeData.txt\n";
  $filesForChildren[5]=realpath(dirname(__FILE__))."/Station1DefectResults.txt\n";
  $filesForChildren[6]=realpath(dirname(__FILE__))."/Station2DefectResults.txt\n";
  $filesForChildren[7]=realpath(dirname(__FILE__))."/Station3DefectResults.txt\n";
  $filesForChildren[8]=realpath(dirname(__FILE__))."/Station4DefectResults.txt\n";
  $filesForChildren[9]=realpath(dirname(__FILE__))."/Station5DefectResults.txt\n";
  $typesOfChildren[0]=1;
  $typesOfChildren[1]=1;
  $typesOfChildren[2]=1;
  $typesOfChildren[3]=1;
  $typesOfChildren[4]=1;
  $typesOfChildren[5]=0;
  $typesOfChildren[6]=0;
  $typesOfChildren[7]=0;
  $typesOfChildren[8]=0;
  $typesOfChildren[9]=0;
  //Have only the parent create all child processes.  All child processes start running.
  for($i = 0; $i < $numberOfChildProcesses; $i++)
  { 
    $pid = pntcl_fork();
    if($pid == -1)
    {
      die("Could not fork.\n"); //need to make a way to handle not forking later 
    }
    else if($pid)
    {
      $childrenArray[] = $pid1;
    //this is the parent's path
    }
    else
    {
      $fw = new FileWatcher($typesOfChildren[$i],$filesForChildren[$i]);
      $fw -> watchSpecificFile();
      break;
    }
  }
  if($pid)
  {
    //need to put a condition for when to kill all children here.
    for($i = 0; $i < $numberOfChildProcesses; $i++)
    {
       $childID = array_pop($childrenArray);
       posix_kill($childID,SIGKILL); // this is for linux, may have to do something different for windows
       pcntl_waitpid($childID,null);
    }
  
  } 
  */

  function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');



  $tableWriter() = new TableWriter();
  $labInit = new LabInitialization();
  $sensorTable = $labInit -> setUpLab($tableWriter);

  $fileWatcherArray = array();
  $fileWatcherArray[] = new FileWatcher(1, realpath(dirname(__FILE__))."/Cell1Station1TimeData",$sensorTable[0]);
  $fileWatcherArray[] = new FileWatcher(1, realpath(dirname(__FILE__))."/Cell1Station2TimeData",$sensorTable[1]);
  $fileWatcherArray[] = new FileWatcher(1, realpath(dirname(__FILE__))."/Cell1Station3TimeData",$sensorTable[2]);
  $fileWatcherArray[] = new FileWatcher(1, realpath(dirname(__FILE__))."/Cell1Station4TimeData",$sensorTable[3]);
  $fileWatcherArray[] = new FileWatcher(1, realpath(dirname(__FILE__))."/Cell1Station5TimeData",$ssensorTable[4]);
  $fileWatcherArray[] = new FileWatcher(0, realpath(dirname(__FILE__))."/Cell1Station1DefectResults",$sensorTable[0]);
  $fileWatcherArray[] = new FileWatcher(0, realpath(dirname(__FILE__))."/Cell1Station2DefectResults",$sensorTable[1]);
  $fileWatcherArray[] = new FileWatcher(0, realpath(dirname(__FILE__))."/Cell1Station3DefectResults",$sensorTable[2]);
  $fileWatcherArray[] = new FileWatcher(0, realpath(dirname(__FILE__))."/Cell1Station4DefectResults",$sensorTable[3]);
  $fileWatcherArray[] = new FileWatcher(0, realpath(dirname(__FILE__))."/Cell1Station5DefectResults",$sensorTable[4]);

  $fileWatcherArraySize = count($fileWatcherArray);
  $directory = realpath(dirname(__FILE__));
        //echo "Directory: ".$directory."\n";
  $directoryContents = scandir($directory) or die("Unable to read directory\n"); // may need to make a softer error handling later
  $oldDirectoryContentsSize = count($directoryContents);  
  while(true)
  {

       //while($this -> getRunning())
       //{
       $newDirectoryContents = scandir($directory);
       echo "Old Directory Size: ".$oldDirectoryContentsSize."\n";
       echo "New Directory Size: ".count($newDirectoryContents)."\n";
       if($oldDirectoryContentsSize != count($newDirectoryContents))
       {
  	 for($i = 0; $i < $fileWatcherArraySize; $i++)
  	 {
  		$fileWatcherArray[$i] -> processSimilarFiles($newDirectoryContents);
  	 }
         $oldDirectoryContentsSize = count(scandir($directory));
         break;
       }	
  }
  echo "Done\n";
?>
