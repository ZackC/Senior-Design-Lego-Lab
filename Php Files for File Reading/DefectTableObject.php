<?php
  class DefectTableObject extends TableObject
  {
    private $defects;
    private $stationNumber;

    public function __construct()
    {
      parent::__construct();
    }
    
    public function getDefects()
    {
      return $this -> defects;
    }
    
    public function getStationNumber()
    {
    	return $this->stationNumber;
    }
 
    public function setDefects($newDefects)
    {
      $this -> defects = $newDefects;
    }
    
    public function setStationNumber($newStationNumber)
    {
    	$this->stationNumber = $newStationNumber;
    }
  }
?>
