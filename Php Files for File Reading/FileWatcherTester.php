<?php
/*function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');*/
  
  // this is a class used to test the file watcher and not part of the main project
  function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
  
  echo realpath(dirname(__FILE__))."/Station1TimeData2.txt\n";
  //$file = fopen(realpath(dirname(__FILE__))."/Station1TimeData2.txt",'r') or die("Test is unable to open file.\n");
  //fclose($file);

  //currently prints that file changed if a change occured
  //$fw = new FileWatcher(1,realpath(dirname(__FILE__))."/Station1TimeData2.txt");
  //$fw -> watchSpecificFile();

   // currently deleted any new file created that meets the criteria while printing
   // out a deleting message
   $fw = new FileWatcher(1,realpath(dirname(__FILE__))."/test");
   $fw -> watchDirectoryForSimilarFiles();
?>
