<?php
class FileGenerator
{
	private $numCars = 30;
	private $carsDone = 0;
	private $currentCar = 1;
	private $numSensors = 5;
	
	private $waitPeriod = 1;
	
	private $timeSpent = 3.01;
	private $add = 1.50;	
	private $pTime = 3.00;
	private $sensorTimes;
	
	private $hasDefect = 0;
	private $stationsWithDefect;
	
	private $baseFileName = "Cell1Sensor";
	private $defect = "DefectResults";
	private $timeData = "TimeData";

	public function __construct()
	{
		date_default_timezone_set('America/Chicago');
		$this->sensorTimes = array_fill(0, $this->numSensors, 0);
		$this->stationsWithDefect = array_fill(0, $this->numSensors, 0);
	}
	
	public function createFiles()
	{
          while($this->carsDone < $this->numCars)
	  {
            if($this ->currentCar == 3)
            {
              $this -> stationsWithDefect[1] = 1;
            }
            if($this -> currentCar == 4)
            {
              $this -> stationsWithDefect[1] = 1;
            }
            if($this -> currentCar == 15)
            {
              $this -> stationsWithDefect[3] = 1;
            }
            echo "Current car: ".$this->currentCar."\n";
            if ($this->currentCar <= $this->numSensors)
            {
               for ($count = 1; $count <= $this->currentCar; $count++)
	       {
		 if ($count == $this->currentCar)
		 {
		   $this->sensorTimes[$count - 1] = $this->timeSpent;
	         }
		 else
		 {
		   $this->sensorTimes[$count - 1] += $this->pTime;
		   $this->timeSpent = ($this->sensorTimes[$count - 1] + $this->add);
	         }
                 if ($this->stationsWithDefect[$count - 1] < 2)
		 {
		   $this -> writeFiles($count);
		 }
                 else
                 {
                   echo "Station: ".($count - 1)." Car Number: ".$this -> currentCar." contained a defect and not printing file.\n";
                 }
	       }
               $this-> propagateDefect();
               echo "incrementing current car\n";
	       $this->currentCar++;
               echo "new current car value: ".$this -> currentCar."\n";
	     }
	     else if ($this->currentCar <= $this->numCars)
	     {
	       for ($count = $this -> numSensors; $count > 0; $count--)
	       {
		 $this->sensorTimes[$count - 1] += $this->pTime;
                 if ($this->stationsWithDefect[$count - 1] < 2)
		 {
		   $this -> writeFiles($count);
	         }
	       }
	       $this->timeSpent += $this->add;
	       $this -> propagateDefect();
	       $this->currentCar++;
	       $this->carsDone++;
	     }
	     else
	     {
	       for ($count = ($this->carsDone - $this->numSensors + 1); $count <= $this->numSensors; $count++)
	       {
		 $this->sensorTimes[$count - 1] += $this->pTime;
                 if ($this->stationsWithDefect[$count - 1] < 2)
	         {
		   $this -> writeFiles($count);
		 }
	       }
	       $this->timeSpent += $this->add;
	       $this -> propagateDefect();
	       $this->carsDone++;
	     }
             echo "Current car at end of while: ".$this -> currentCar."\n";
	  }
	}

         public function propagateDefect()
         {
           for ($index = $this->numSensors - 1; $index >= 0; $index--)
	   {
	     if ($this->stationsWithDefect[$index] != 0)
	     {
	       if ($index != $this->numSensors - 1)
	       {
		 $this->stationsWithDefect[$index + 1] = 2;
	       }
	       $this->stationsWithDefect[$index] = 0;
             }
	   }
         }

         public function writeFiles($count)
         {
           $fileName = $this->baseFileName . $count . $this->timeData . "-" . date("Ymd") . "T" . date("His") . ".txt";
	   $handle = fopen($fileName, 'w');
	   fwrite($handle, $this->sensorTimes[$count - 1]);
	   fwrite($handle, " " . ($this->sensorTimes[$count - 1] + $this->add));
           fclose($handle);
	   $fileName = $this->baseFileName . $count . $this->defect . "-" . date("Ymd") . "T" . date("His") . ".txt";
	   $handle = fopen($fileName, 'w');
           if($this -> stationsWithDefect[$count - 1] == 0)
           {
	     fwrite($handle, $this->hasDefect);
           }
           else
           {
             fwrite($handle, "1 4,5,6");
           }
	   fclose($handle);
           $handle = null;
	   sleep($this->waitPeriod);
         }
}
?>
