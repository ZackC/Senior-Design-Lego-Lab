<?php
/*
function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
*/
  
  /*
   * This class stores the information that will go in the defect table
   *
   */
  class DefectTableObject extends TableObject
  {
    // the array of defects 
    private $defects = 0;

    // the default constructor
    public function __construct()
    {
      parent::__construct();
    }
    
    // returns the array of defects
    public function getDefects()
    {
      return $this -> defects;
    }
    
    /*public function getStationNumber()
    {
    	return $this->stationNumber;
    }*/
 
    // sets the array of defects
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
