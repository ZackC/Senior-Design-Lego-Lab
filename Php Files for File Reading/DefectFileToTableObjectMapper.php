<?php
  /*
   * The class that handles rearranging the information from the 
   * defect file into the way it can go into the table
   */ 
  class DefectFileToTableObjectMapper extends FileToTableObjectMapper
  {
   
    //maps the data from file information to table information 
    //$data - the information from the defect file
    public function mapData($data, $tableObject)
    {
      if($data[0] == 1)
      {
        $defects = explode(",",$integersString);
      }
      $tableObject -> setDefects($defects);
    }


  }
?>
