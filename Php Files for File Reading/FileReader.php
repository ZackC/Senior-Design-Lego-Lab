<?php
  /*
   * The general file reader class.  This is the abstract parent of the defect file reader
   * and the time file reader.
   */
  abstract class FileReader
  {
     // the name of the file
     private $filename;

     // the constructor
     //$newFilename - the filename for the object
     public function __construct($newFilename)
     {
       $this -> setFilename($newFilename);
     }

     //returns a string of all the information in the file if it can open it
     public function openFile()
     {

       if(isset($this -> filename))
       {
          $file = file_get_contents($this -> filename) or exit("Unable to open ($this->filename)"); // might need to change this from exit to ending gracefully, but for current testing this should be fine
//may also need to look into the false return from the file_get_contents while testing
         return $file;
       }
       else
       {
         exit("No file specified");
       }
     }

     // the standard interface for extracting the file data
     abstract protected function extractData($fileContents);

     //sets the filename to a new filename
     //$newFilename - the new file for the class to read
     public function setFilename($newFilename)
     {
       $this -> filename = $newFilename;
     }
     
  }
?>
