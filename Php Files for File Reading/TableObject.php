<?php
  class TableObject
  {

    private $fileTime = 0;
    private $cellNumber = 0;
    private $sensorNumber = 0;

    public function __construct()
    {

    }

    public function getCellNumber()
    {
      return $this -> cellNumber;
    }

    public function getFileTime()
    {
      return $this -> fileTime;
    }

    public function getSensorNumber()
    {
      
      return $this -> sensorNumber;
    }

    public function setCellNumber($newCellNumber)
    {
      echo "Cell: ".$newCellNumber."\n";
      $this -> cellNumber = $newCellNumber;
    }

    public function setFileTime($newFileTime)
    {
      $this -> fileTime = $newFileTime;
    }

    public function setSensorNumber($newSensorNumber)
    {
      echo "Sensor: ".$newSensorNumber."\n";
      $this -> sensorNumber = $newSensorNumber;
    }

  }  
?>
