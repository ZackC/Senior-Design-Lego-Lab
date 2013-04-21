<?php
/*function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
  */
  /*
   * The class that insures that the information stored in the time table objects is
   * valid before putting it in the table.
   */
  class TimeTableObjectValidator extends TableObjectValidator
  {
     // the method that validates the time table object
     //$tableObject - the object to be validated
     public function validateTableObject($tableObject)
     {
     	echo $this -> validateCellNumber($tableObject -> getCellNumber())."\n";
        echo $this -> validateSensorNumber($tableObject -> getSensorNumber())."\n";
        echo $this -> validateFileTime($tableObject -> getFileTime())."\n";
        echo $this -> isValidTimeInput($tableObject -> getOnTime())."\n";
        echo $this -> isValidTimeInput($tableObject -> getOffTime())."\n";

        return $this -> validateCellNumber($tableObject -> getCellNumber()) and 
     	  $this -> validateSensorNumber($tableObject -> getSensorNumber()) and
     	  $this -> validateFileTime($tableObject -> getFileTime()) and 
          $this -> isValidTimeInput($tableObject -> getOnTime()) and
          $this -> isValidTimeInput($tableObject -> getOffTime());
     }

     // the method that checks to see if an input is a valid way of writing time for 
     // the system.  At the moment, this method doesn't accept whitespace since I wasn't
     // sure what part would be checking for that
     public function isValidTimeInput($timeInput)
     {
        return preg_match('/^\d+\.\d\d$/',$timeInput); // if there can only be 2 digits on the right side of the decimal.
        //return preg_match('/^\d+\.\d$/',$timeInput);  // line for there can be multiple digits on both sides of the decimal.
     }
  }
?>
