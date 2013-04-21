<?php
/*function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');*/
  
/*
 *  The class used to read time information from the file.
 *  It contains specific methods for reading time information.
 */

  

  class TimeFileReader extends FileReader
  {
     //the constructor
     //$filename - the file to read from
     public function __construct($filename)
     {
        parent::__construct($filename);
     }

     //extracts the time information out of the file
     //$fileContents - the string of the file contents
     public function extractData($fileContents)
     {
        $item_count = 0;
        echo "|$fileContents|";
        $lineArray = explode("\n",$fileContents);
        $lineArraySize = count($lineArray);
        for($i = 0; $i<$lineArraySize;$i++)
        {
          $stringArray[$i] = explode(" ",$lineArray[$i]); 
        }
        return $stringArray;
     }
  }
?>
