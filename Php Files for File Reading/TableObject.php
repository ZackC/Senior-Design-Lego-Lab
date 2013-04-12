<?php

  class TableObject
  {

    private $fileTime;
    private $cellNumber;
    private $sensorNumber;

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
