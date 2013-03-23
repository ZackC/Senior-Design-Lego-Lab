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
       
     }

      //checks to see if the provided parameter is a string of integers
      //returns true if it is and false if it is not.
      //at the moment it does not handle spaces between the commas and integers 
      //    --need to add that.
      public function isCommaSeperatedIntegers($integersString)
      {
         $integers = explode(",",$integersString);
         $size = count($integers);
         for($i = 0; $i < $size; $i++)
         {
            if(preg_match('/^\d+$/',$integers[$i]) == FALSE)
            {
               return FALSE;
            }
         }
         return TRUE;
      }
  }
?>

