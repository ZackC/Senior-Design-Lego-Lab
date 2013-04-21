<?php
  /*
   * The general class for converting file information into a format to go into the 
   * database tables.
   */
  abstract class FileToTableObjectMapper
  {
    // the characters in the file name until the cell number is found
    const CHARACTERS_TILL_CELL_NUMBER = 4; 
    // the characters in the file name until the station number is found
    const CHARACTERS_TILL_STATION_NUMBER = 11;
    // the number of time characters in the file name
    // the size of the time information
    const TIME_CHARACTERS = 6;
    // the sensor that is creating the information in the files
    protected $sensor;

    // newSensor - the sensor that is generating the file information
    public function __construct($newSensor)
    {
      $this -> sensor = $newSensor;
    }
    

    // the function used to convert the data from a file format to a table format
    //$data - the information from the file.
    //$tableObject - the object that is storing the information from the files
    abstract protected function mapData($data, $tableObject);

    /*
     *  Maps the information that is stored in the filename ot the table object
     *  $filename - the name of the file
     *  $tableObject - the object where the information is stored
     */
    public function mapInformationFromFileName($filename, $tableObject)
    {
      //echo "Cell Number: ".substr($filename,self::CHARACTERS_TILL_CELL_NUMBER, 1)."\n";
      //echo "Sensor Number: ".substr($filename,self::CHARACTERS_TILL_STATION_NUMBER,1)."\n";
      //echo "File Time: ".substr($filename,strrpos($filename,"T")+1,self::TIME_CHARACTERS)."\n";
      $tableObject -> setCellNumber(substr($filename,strrpos($filename,"/") + 1 + self::CHARACTERS_TILL_CELL_NUMBER, 1));
      $tableObject -> setSensorNumber(substr($filename,strrpos($filename,"/") + 1 + self::CHARACTERS_TILL_STATION_NUMBER,1)); 
      $tableObject -> setFileTime(substr($filename,strrpos($filename,"T")+1,self::TIME_CHARACTERS));
    }
  }
?>
