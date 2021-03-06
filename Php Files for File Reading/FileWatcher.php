<?php
/*function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
*/  
  /*
   * The class that handles watching for file changes.  I am not sure if they are only 
   * writing a few files and changing them or if they are adding new files with a 
   * different ending at the moment.  This class can handle both.
   */
  class FileWatcher
  {
     //the boolean tha controls the checking the file loop
     private $running = TRUE;
     // the time that the file was last modified
     private $lastModifiedTime;
     // the object that will read from the file and extract the data when it changes
     private $fileToTableObject;
     // the file to read from, or the file prefix and path if new files are being created
     private $filename;
     // the object that is writing the database
     private $tableWriter;


     //the constructor
     //$type - the type of the file being watched (1 for time file, anything else for 
     //    defect files
     //$newFilename - the name of the file to watch
     //$sensorInformation - the sensor object
     //$tableWriter - the writer to the database
     public function __construct($type, $newFilename, $sensorInformation,$tableWriter)  // may need to change constructor if we change class to use observer pattern
     {
        $this -> fileToTableObject = new FileInformationToValidTableObject($type, $newFilename,$sensorInformation,$tableWriter); // may have to change this if watching a directory instead of a file
        $this -> filename = $newFilename;
     }

     // the function that watches a specific file for changes.
     public function watchSpecificFile()
     {
       if(file_exists($this -> filename))
       {
         
         $lastModifiedTime = filemtime($this -> filename);
         while($this -> getRunning())
         {
           clearstatcache();
           //echo "last modified time of file: ".filemtime($this -> filename)."\n";
           if($lastModifiedTime != filemtime($this -> filename))
           {
             echo "File Changed."; //used for testing
             //$this -> fileToTableObject -> fileDataToTable() //do what we want here - may need to change to observer design pattern later
             $lastModifiedTime = filemtime($this -> filename);
           }
         }
       }
       else
       {
         $fileString = $this -> filename;
         die("File doesn't exist: $fileString\n"); //may need to change to error later instead of die
       }
     }

     //function that watches the directory of the file for new files to be added to the 
     //directory.  It will read files that contain the basename of the original 
     //filename.  
     // **notice the error comment below.  
     public function processSimilarFiles($newDirectoryContents)
     {
       //echo $this -> filename;
       
          // $oldDirectoryContentsSize = count($newDirectoryContents); //may change this if deleting files
           $size = count($newDirectoryContents);
           for($i = 0; $i < $size; $i++)
           {
             // at moment could have error with this if the other system builds up a lot of files before we read any since this doesn't do any ordering.  Will need to know there ordering system better before this is fixed.
             
             //echo "basename: ".basename($this -> filename)."\n";
             //echo "File being compared: ".$newDirectoryContents[$i]."\n";
             if(strpos($newDirectoryContents[$i],basename($this -> filename)) !== FALSE)
             {
                 $directory = dirname($this -> filename);
                 $this -> fileToTableObject -> setFilename($directory."/".$newDirectoryContents[$i]);
                 
                 //echo "Found File.\n";
                 //echo "{$newDirectoryContents[$i]}\n";
                 if($this -> fileToTableObject -> fileDataToTable())   //may need to change if implementing observer pattern
                 {
                   $directory = dirname($this -> filename);
                   unlink($directory."/".$newDirectoryContents[$i]);
                 }
             }
             //echo strpos($newDirectoryContents[$i],basename($this -> filename));
           }
             

           //$this -> setRunning(false);
         //}
       //}
     }

     //sets the running boolean to the value of $newRunning
     //$newRunning - the new value for the running boolean
     public function setRunning($newRunning)
     {
       $this -> running = $newRunning;
     }

     //returns the value of the running boolean
     public function getRunning()
     {
        return $this -> running;
     }

     // returns the table object
     public function getTableObject()
     {
        return $this -> fileToTableObject -> getTableObject();
     }
  }
?>
