<?php
//the tester for parts of the station information class
//
//this file is not part of the main program

function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
  
/*    function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
*/

  $si = new StationInformation(1,1,1,1,1,1,1,1);
  $timeTotal = 450;
  $timeCount = 6;
  $arrayPoints = 5;
  $array = array(45,67,34,132,7);
  $si -> addTimePoint(80,$timeCount,$timeTotal,$arrayPoints,$array);
  echo "New time total: ".$timeTotal."\n";
  echo "New time count: $timeCount\n";
  echo "New array points: $arrayPoints\n";
  echo "New array values\n";
  for($i = 0; $i < count($array); $i++)
  {
    echo $array[$i]."\n";
  }
?>
