<?php
  /**
   *
   * The object holding the information that will go into the table;
   * it holds the information that you will get from files
   */
  class TableObject
  {
    //the time that the file was made
    private $fileTime = 0;
    //the cell for the file
    private $cellNumber = 0;
    //the sensor that produced the file
    private $sensorNumber = 0;

    //the default constructor for the clas
    public function __construct()
    {

    }

    //returns the cell number
    public function getCellNumber()
    {
      return $this -> cellNumber;
    }

    //returns the file time
    public function getFileTime()
    {
      return $this -> fileTime;
    }

    //returns the sensor number
    public function getSensorNumber()
    {
      
      return $this -> sensorNumber;
    }

   //sets the cell number
    public function setCellNumber($newCellNumber)
    {
      echo "Cell: ".$newCellNumber."\n";
      $this -> cellNumber = $newCellNumber;
    }

    //sets the file time
    public function setFileTime($newFileTime)
    {
      $this -> fileTime = $newFileTime;
    }

    //sets the sensor time
    public function setSensorNumber($newSensorNumber)
    {
      echo "Sensor: ".$newSensorNumber."\n";
      $this -> sensorNumber = $newSensorNumber;
    }

  }  
?>
