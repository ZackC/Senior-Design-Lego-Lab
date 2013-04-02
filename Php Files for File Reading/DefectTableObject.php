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
      return $defects;
    }
 
    public fucntion setDefects($newDefects)
    {
      $this -> defects = $newDefects;
    }
  }
?>
