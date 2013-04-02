<?php
  /*
   * The class that converts the information from the time file to the 
   * form required to put the time in the tables.
   */
  class TimeFileToTableObjectMapper extends FileToTableObjectMapper
  {

    //maps the information stored in $data into a format that can 
    //be put in tables.
    public function mapData($data, $tableObject)
    {
       echo "data: ".$data."\n";
       echo $data[1]."\n";
       echo $data[0][0]."\n";
       echo $data[0][1]."\n";
       $tableObject -> setOnTime($data[0][0]);
       $tableObject -> setOffTime($data[0][1]);
    }
  }
?>
