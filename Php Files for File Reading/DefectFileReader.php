<?php
    /*
     * This is the class for reading defect files.
     */

/*function my_autoloader($class)
{
	include realpath(dirname(__FILE__))."/".$class.'.php';
}
 
spl_autoload_register('my_autoloader');
*/

  //The constructor of the class. 
  class DefectFileReader extends FileReader
  { 
    //$filename - the string of the file path to read from 
    public function __construct($filename)
    {
      parent::__construct($filename);
    }

    //Extracts data in the specific way necessary for the defect files
    //$fileContents - the string of the contents of the file
    public function extractData($fileContents)
    {
        $item_count = 0;
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
