<?php
  /*
   *  The class that validates the information in the table object. This
   *  class performs the small level data checks on the table object.
   */
  class DefectTableObjectValidator extends TableObjectValidator
  {
     // Determines if the tableObject is fit to be put into the table.
     // Haven't decided if the method should put it in the table or
     // handle it another way yet.
     public function validateTableObject($tableObject)
     {
     	$defects = $tableObject -> getDefects();
     	$checkedDefects = true;
     	for($i = 0; $i < count($defects); $i++)
     	{
     	  if(!$this -> isInteger($defects[$i]))
     	  {
     	  	$checkedDefects = false;
     	  	break;
     	  }
     	}
     	return $checkedDefects and 
     	$this -> validateCellNumber($tableObject -> getCellNumber()) and
     	$this -> validateSensorNumber($tableObject -> getSensorNumber()) and
     	$this -> validateFileTime($tableObject -> getFileTime());
     	
     }

      //checks to see if the provided parameter is a string of integers
      //returns true if it is and false if it is not.
      //at the moment it does not handle spaces between the commas and integers 
      //    --need to add that.
      public function isInteger($possibleInteger)
      {
         if(preg_match('/^\d+$/',$possibleInteger) == FALSE)
         {
            return FALSE;
         }
         return TRUE;
      }
  }
?>

