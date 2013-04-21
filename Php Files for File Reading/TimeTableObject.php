<?php
/*function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
  */

  /**
   * The object that stores the time information
   *
   */
  class TimeTableObject extends TableObject
  {
    //the on time from the file
    private $onTime = 0;
    //the off time for the file
    private $offTime = 0;

    //the default constructor for the class
    public function __construct()
    {
      parent::__construct();
    }

    //returns the on time
    public function getOnTime()
    {
      return $this -> onTime;
    }

    //returns the off time
    public function getOffTime()
    {
      return $this -> offTime;
    }

    //sets the on time
    public function setOnTime($newOnTime)
    {
      $this -> onTime = $newOnTime;
    }

    //sets the off time
    public function setOffTime($newOffTime)
    {
      $this -> offTime = $newOffTime;
    }
  }
?>
