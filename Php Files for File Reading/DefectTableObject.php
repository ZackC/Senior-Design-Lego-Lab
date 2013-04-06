<?php
  class DefectTableObject extends TableObject
  {
    private $defects;

    public function __construct()
    {
      parent::__construct();
    }
    
    public function getDefects()
    {
      return $this -> defects;
    }
 
    public function setDefects($newDefects)
    {
      $this -> defects = $newDefects;
    }
  }
?>
