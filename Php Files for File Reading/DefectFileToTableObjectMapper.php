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
      echo "data: ".$data."\n";
      echo "data[0][0]: ".$data[0][0]."\n";
      if($data[0][0] == 1)
      {
        $defects = explode(",",$data[0][1]);
        $tableObject -> setDefects($defects);
        return true;
      }
      return false;
    }


  }
?>
