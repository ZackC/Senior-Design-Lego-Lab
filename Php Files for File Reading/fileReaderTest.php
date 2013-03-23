<?php
//this class is for testing the php file reader

function my_autoloader($class)
{
  echo realpath(dirname(__FILE__))."\n";
  echo "$class.php"."\n";
  include realpath(dirname(__FILE__))."/".$class.'.php';
}

spl_autoload_register('my_autoloader');
$filename = realpath(dirname(__FILE__))."/Station1TimeData.txt";
echo "Filename: ".$filename."\n";
// tests the time file reader
$fileReader = new TimeFileReader($filename);

$timeFileString = $fileReader -> openFile();
echo "Time File String: ".$timeFileString."\n";
$timeInfo = $fileReader->extractData($timeFileString);
$size = count($timeInfo);
for($i = 0; $i < $size; $i++)
{
  $insideSize = count($timeInfo[$i]);
  for($j = 0; $j < $insideSize; $j++)
  {
    echo "$i $j : {$timeInfo[$i][$j]}\n";
  }
}
// tests the defect file reader
$fileReader2 = new DefectFileReader(realpath(dirname(__FILE__))."/Station1DefectResults.txt");
$defectInfo = $fileReader2->extractData($fileReader2 -> openFile());
$size = count($defectInfo);
for($i = 0; $i < $size; $i++)
{
  $insideSize = count($defectInfo[$i]);
  for($j = 0; $j < $insideSize; $j++)
  {
    echo "$i $j : {$defectInfo[$i][$j]}\n";
  }
}
?>
