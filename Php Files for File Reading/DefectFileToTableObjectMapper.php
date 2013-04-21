<?php
/*function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
*/
  
  /*
   * The class that handles rearranging the information from the 
   * defect file into the way it can go into the table
   */ 
  class DefectFileToTableObjectMapper extends FileToTableObjectMapper
  {
   
    //the default constructor for the class
    // newSensor - the sensor that is sensing the defect
    public function __construct($newSensor)
    {
      parent::__construct($newSensor);
      //echo "Added sensor to defect file object.\n";
    }

    //maps the data from file information to table information 
    //$data - the information from the defect file
    public function mapData($data, $tableObject)
    {
      
      //echo "data: ".$data."\n";
      //echo "data[0][0]: ".$data[0][0]."\n";
      if($data[0][0] == 1)
      {
        $this -> sensor -> incrementDefectCarNumber(true);
        $this -> sensor -> getBeforeStation() -> updateStatus(4,$this -> sensor -> getDefectCarNumber());
        $defects = explode(",",$data[0][1]);
        $tableObject -> setDefects($defects);
        return true;
      }
      $this -> sensor -> incrementDefectCarNumber(false);
      $this -> sensor -> getBeforeStation() -> updateStatus(1,$this -> sensor -> getDefectCarNumber());
      return false;
    }


  }
?>
