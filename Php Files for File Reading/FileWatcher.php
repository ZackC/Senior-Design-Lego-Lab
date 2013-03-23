<?php
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

     //the constructor
     //$type - the type of the file being watched (1 for time file, anything else for 
     //    defect files
     //$newFilename - the name of the file to watch
     public function __construct($type, $newFilename)  // may need to change constructor if we change class to use observer pattern
     {
        $this -> fileToTableObject = new FileInformationToValidTableObject($type, $newFilename); // may have to change this if watching a directory instead of a file
        $this -> filename = $newFilename;
        $filenamesetto = $this -> filename;
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
         echo "File was : $fileString\n";
         die("Unable to open file\n"); //may need to change to error later instead of die
       }
     }

     //function that watches the directory of the file for new files to be added to the 
     //directory.  It will read files that contain the basename of the original 
     //filename.  
     // **notice the error comment below.  
     public function watchDirectoryForSimilarFiles()
     {
       //echo $this -> filename;
       $directory = dirname($this -> filename);
       //echo $directory;
       $directoryContents = scandir($directory) or die("Unable to read director\n"); // may need to make a softer error handling later
       $oldDirectoryContentsSize = count($directoryContents);
       while($this -> getRunning())
       {
         $newDirectoryContents = scandir($directory);
         if($oldDirectoryContentsSize != count($newDirectoryContents))
         {
          // $oldDirectoryContentsSize = count($newDirectoryContents); //may change this if deleting files
           $size = count($newDirectoryContents);
           for($i = 0; $i < $size; $i++)
           {
             // at moment could have error with this if the other system builds up a lot of files before we read any since this doesn't do any ordering.  Will need to know there ordering system better before this is fixed.
             //echo "basename: ".basename($this -> filename)."\n";
             //echo "File being compared: ".$newDirectoryContents[$i]."\n";
             if(strpos($newDirectoryContents[$i],basename($this -> filename)) !== FALSE)
             {
                 //$this -> fileToTableObject -> setFilename($newDirectoryContents[$i]);
                 //$this -> fileToTableObject -> fileDataToTable();   //may need to change if implementing observer pattern
                 echo "Deleting file.\n";
                 echo "{$newDirectoryContents[$i]}\n";
                 unlink($newDirectoryContents[$i]);
             }
             //echo strpos($newDirectoryContents[$i],basename($this -> filename));
           }
           $oldDirectoryContentsSize = count(scandir($directory));  
         }
       }
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
  }
?>
