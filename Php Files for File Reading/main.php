<?php
function my_autoloader($class)
{
	include realpath(dirname(__FILE__))."/".$class.'.php';
}
spl_autoload_register('my_autoloader');

$generator = new FileGenerator();
$generator->createFiles();
?>