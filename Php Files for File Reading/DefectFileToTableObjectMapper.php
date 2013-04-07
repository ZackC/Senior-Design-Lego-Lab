<?php
  /*
   * The class that handles rearranging the information from the 
   * defect file into the way it can go into the table
   */ 
  class DefectFileToTableObjectMapper extends FileToTableObjectMapper
  {
   
    public function __construct($newSensor)
    {
      parent::__construct($newSensor);
    }

    //maps the data from file information to table information 
    //$data - the information from the defect file
    public function mapData($data, $tableObject)
    {
      $this -> sensor -> incrementDefectCarNumber();
      echo "data: ".$data."\n";
      echo "data[0][0]: ".$data[0][0]."\n";
      if($data[0][0] == 1)
      {
        $this -> sensor -> getBeforeStation() -> updateStatus($this -> sensor -> getDefectCarNumber(),4);
        $defects = explode(",",$data[0][1]);
        $tableObject -> setDefects($defects);
        return true;
      }
      $this -> sensor -> getBeforeStation() -> updateStatus($this -> sensor -> getDefectCarNumber(),1);
      return false;
    }


  }
?>
