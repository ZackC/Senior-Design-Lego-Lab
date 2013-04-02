<?php
  /*
   * The general class for converting file information into a format to go into the 
   * database tables.
   */
  abstract class FileToTableObjectMapper
  {


    const CHARACTERS_TILL_CELL_NUMBER = 4;
    const CHARACTERS_TILL_STATION_NUMBER = 12;
    const TIME_CHARACTERS = 6;

    // the function used to convert the data from a file format to a table format
    //$data - the information from the file.
    abstract protected function mapData($data, $tableObject);

    public function mapTimeFromFileName($filename, $tableObject)
    {
      $tableObject -> setCellNumber(substr($filename,self::CHARACTERS_TILL_CELL_NUMBER, 1));
      $tableObject -> setStationNumber(substr($filename,self::CHARACTERS_TILL_STATION_NUMBER,1)); 
      $tableObject -> setFileTime(substr($filename,strrpos($filename,"T")+1,self::TIME_CHARACTERS));
    }
  }
?>
