<?php
function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
  
  class TimeTableObject extends TableObject
  {
    private $onTime = 0;
    private $offTime = 0;

    public function __construct()
    {
      parent::__construct();
    }

    public function getOnTime()
    {
      return $this -> onTime;
    }

    public function getOffTime()
    {
      return $this -> offTime;
    }

    public function setOnTime($newOnTime)
    {
      $this -> onTime = $newOnTime;
    }

    public function setOffTime($newOffTime)
    {
      $this -> offTime = $newOffTime;
    }
  }
?>
