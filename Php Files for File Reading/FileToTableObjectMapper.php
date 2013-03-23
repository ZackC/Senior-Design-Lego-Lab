<?php
  /*
   * The general class for converting file information into a format to go into the 
   * database tables.
   */
  abstract class FileToTableObjectMapper
  {
    // the function used to convert the data from a file format to a table format
    //$data - the information from the file.
    abstract protected function mapData($data);
  }
?>
