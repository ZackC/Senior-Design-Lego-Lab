<?php

  class TableObject
  {

    private $fileTime;
    private $cellNumber;
    private $stationNumber;

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

    public function getStationNumber()
    {
      return $this -> stationNumber;
    }

    public function setCellNumber($newCellNumber)
    {
      $this -> cellNumber = $newCellNumber;
    }

    public function setFileTime($newFileTime)
    {
      $this -> fileTime = $newFileTime;
    }

    public function setStationNumber($newStationTime)
    {
      $this -> stationNumber = $newStationTime;
    }

  }  
?>
