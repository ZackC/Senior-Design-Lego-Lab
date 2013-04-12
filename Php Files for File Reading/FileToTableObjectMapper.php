<?php
  /*
   * The general class for converting file information into a format to go into the 
   * database tables.
   */
  abstract class FileToTableObjectMapper
  {


    const CHARACTERS_TILL_CELL_NUMBER = 4; 
    const CHARACTERS_TILL_STATION_NUMBER = 11;
    const TIME_CHARACTERS = 6;
    protected $sensor;

    public function __construct($newSensor)
    {
      $this -> sensor = $newSensor;
    }
    

    // the function used to convert the data from a file format to a table format
    //$data - the information from the file.
    abstract protected function mapData($data, $tableObject);

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
