<?php
//this class is not part of the program.
//it is a test for a the php unit tests
function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
  
require_once('PHPUnit.php');
require_once('DefectFileReaderTester.php');

$suite = new PHPUnit_TestSuite("ThisIsATest");
$result = PHPUnit::run($suite);

echo $result->toString();
?>
