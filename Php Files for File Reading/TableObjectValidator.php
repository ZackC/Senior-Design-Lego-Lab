<?php
  /*
   *  The general class for validating objects that will go into the table
   */ 
  abstract class TableObjectValidator
  {
    // validates the table object
    //$tableObject - the object that is checked to make sure it is fit to go in the table
    abstract protected function validateTableObject($tableObject);
  }
?>
