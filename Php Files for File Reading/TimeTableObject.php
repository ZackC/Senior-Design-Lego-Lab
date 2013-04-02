<?php
  class TimeTableObject extends TableObject
  {
    private $onTime;
    private $offTime;

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
