<?php
function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
  
  class DefectTableObject extends TableObject
  {
    private $defects = 0;
    private $stationNumber;

    public function __construct()
    {
      parent::__construct();
    }
    
    public function getDefects()
    {
      return $this -> defects;
    }
    
    /*public function getStationNumber()
    {
    	return $this->stationNumber;
    }*/
 
    public function setDefects($newDefects)
    {
      $this -> defects = $newDefects;
    }
    
    /*public function setStationNumber($newStationNumber)
    {
    	$this->stationNumber = $newStationNumber;
    }*/
  }
?>
