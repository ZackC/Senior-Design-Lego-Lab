<?php
  /*
   * This is the general class for converting file information into information that
   * can go into a table.  This class handles the whole process from reading the 
   * information, then puts it in the correct form, and then validates the information
   * in that form.
   */
  class FileInformationToValidTableObject
  {
     // the file reader object
     private $fileReader;
     // the file to table object mapper object
     private $fileToObjectMapper;
     // the table object validating object
     private $tableObjectValidator;

     private $tableObject;
     
     private $tableWriterDelegator;

     private $sensorInformation;

     private $type;

     // Used to construct the two different pathways.  a type 1 is the time file path
     // while any other type is the defect path.  Creates all three objects necessary to
     // extract the information from the file and prepare to put it in the table
     // $type - which type of information the file stores (1 for time, anything else for 
     //      defect)
     // $filename - the name of the file to read from.
     public function __construct($newType,$filename, $newSensorInformation, $tableWriter)
     {
       $this -> sensorInformation = $newSensorInformation;
       $this -> type = $newType;
       if($newType == 1)
       {
         echo "123 Filename: ".$filename."\n";
         
         $this -> fileReader = new TimeFileReader($filename);
         $this -> fileToObjectMapper = new TimeFileToTableObjectMapper($this -> sensorInformation);
         $this -> tableObjectValidator = new TimeTableObjectValidator();
         $this -> tableObject = new TimeTableObject();
         $this -> tableWriterDelegator = new TimeTableWriterDelegator($tableWriter,$this -> sensorInformation);
       } 
       else
       {
         
         $this -> fileReader = new DefectFileReader($filename);
         $this -> fileToObjectMapper = new DefectFileToTableObjectMapper($this -> sensorInformation);
         $this -> tableObjectValidator = new DefectTableObjectValidator();
         $this -> tableObject = new DefectTableObject();
         $this -> tableWriterDelegator = new DefectTableWriterDelegator($tableWriter);
       }
     }
     
     // the method for extracting information from the file and preparing it for the table
     public function fileDataToTable()
     {
        /*if($this -> type == 1)
        {
           $this -> sensorInformation -> incrementTimeFileCarNumber();
        }
        else
        {
           $this -> sensorInformation -> incrementDefectFileCarNumber();
        }*/
        $file = $this -> fileReader -> openFile();
        echo "File contents: ".$file."\n";
        if($file !== false)
        {
          $result = $this -> fileReader -> extractData($file);
          echo "Filename: ".$this -> fileReader -> getFilename()."\n";
          $this -> fileToObjectMapper -> mapInformationFromFileName($this -> fileReader -> getFilename(), $this -> tableObject);
          if($this -> fileToObjectMapper -> mapData($result, $this -> tableObject))
          {
            if($this -> tableObjectValidator -> validateTableObject($this -> tableObject))
            {
              $this -> tableWriterDelegator -> writeTableObjectToTable($this -> tableObject, $this -> sensorInformation);
            }
            else
            {
              die("Unable to verify information from file.\n"); //may need a softer error handling after initial testing
            }
          }
          else
          {
            //die("Unable to map data from file.\n");//may need a softer error handling after initial testing
          echo "Unable to map data or defect file contained no defect.\n";
          }
          echo "Returning true\n";
          return true;
        //return $this -> tableObject;
         }
         else
         {
           echo "Returning false\n";
           return false;
         }
     }

     //sets the file to be read from.
     //$filename - the new file name for the file reader
     public function setFilename($filename)
     {
        echo "Filename gets set to: ".$filename."\n";
        $this -> fileReader -> setFilename($filename);
     }

     public function getTableObject()
     {
       return $this -> tableObject;
     }
  }
?>

