<?php
//this file is used to test parts of the object validator classes
//can't test all of the classes at the moment since they are not finished
function my_autoloader($class)
{
  include realpath(dirname(__FILE__))."/".$class.'.php';
}

spl_autoload_register('my_autoloader');

//tests the tiem table object validator
$ttov = new TimeTableObjectValidator();
$result = $ttov->isValidTimeInput(55.56);
echo "$result\n";
$result = $ttov->isValidTimeInput(.90);
echo "$result\n";
$result = $ttov->isValidTimeInput(34.12);
echo "$result\n";
$result = $ttov->isValidTimeInput();
echo "$result\n";

//tests the defect table object validator
echo "DefectTableObjectValidator\n";
$dtov = new DefectTableObjectValidator();
$result = $dtov ->isCommaSeperatedIntegers("1,2");
echo "1: $result\n";
$result = $dtov ->isCommaSeperatedIntegers("109,47474,4571941,0");
echo "2: $result\n";
$result = $dtov ->isCommaSeperatedIntegers("a,b,c,sdkdkd");
echo "3: $result\n";
$result = $dtov ->isCommaSeperatedIntegers("djdjd");
echo "4: $result\n";
echo "End\n";
?>
