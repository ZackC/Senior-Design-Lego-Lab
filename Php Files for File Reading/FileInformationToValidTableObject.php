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

     // Used to construct the two different pathways.  a type 1 is the time file path
     // while any other type is the defect path.  Creates all three objects necessary to
     // extract the information from the file and prepare to put it in the table
     // $type - which type of information the file stores (1 for time, anything else for 
     //      defect)
     // $filename - the name of the file to read from.
     public function __construct($type,$filename)
     {
       if($type == 1)
       {
         echo "123 Filename: ".$filename."\n";
         $this -> fileReader = new TimeFileReader($filename);
         $this -> fileToObjectMapper = new TimeFileToTableObjectMapper();
         $this -> tableObjectValidator = new TimeTableObjectValidator();
         $this -> tableObject = new TimeTableObject();
       } 
       else
       {
         $this -> fileReader = new DefectFileReader($filename);
         $this -> fileToObjectMapper = new DefectFileToTableObjectMapper();
         $this -> tableObjectValidator = new DefectTableObjectValidator();
         $this -> tableObject = new DefectTableObject();
       }
     }
     
     // the method for extracting information from the file and preparing it for the table
     public function fileDataToTable()
     {
        $result = $this -> fileReader -> extractData($this -> fileReader -> openFile());
        echo "Filename: ".$this -> fileReader -> getFilename()."\n";
        $this -> fileToObjectMapper -> mapTimeFromFileName($this -> fileReader -> getFilename(), $this -> tableObject);
        $this -> fileToObjectMapper -> mapData($result, $this -> tableObject);
        //$this->tableObjectValidator->validateTableObject();
        return $this -> tableObject;
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

