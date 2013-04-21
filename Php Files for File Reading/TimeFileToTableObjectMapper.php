<?php
/*function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
*/  
  /*
   * The class that converts the information from the time file to the 
   * form required to put the time in the tables.
   */
  class TimeFileToTableObjectMapper extends FileToTableObjectMapper
  {

    //the constructor for the class
    //newSensor - the sensor for the object mapper
    public function __construct($newSensor)
    {
      parent::__construct($newSensor);

    }

    //maps the information stored in $data into a format that can 
    //be put in tables. $tableObject - the object to put the data in
    public function mapData($data, $tableObject)
    {
       $this -> sensor -> incrementTimeCarNumber();
       $this -> sensor -> getBeforeStation() -> updateStatus(1,$this -> sensor -> getTimeCarNumber());
       echo "data: ".$data."\n";
       //echo $data[1]."\n";
       echo $data[0][0]."\n";
       echo $data[0][1]."\n";
       $tableObject -> setOnTime($data[0][0]);
       $tableObject -> setOffTime($data[0][1]);
       return true;
    }
  }
?>
