<?php
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