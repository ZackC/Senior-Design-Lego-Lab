<?php
class FileGenerator
{
	private $numCars = 10;
	private $carsDone = 0;
	private $currentCar = 1;
	private $numSensors = 5;
	
	private $waitPeriod = 1;
	
	private $timeSpent = 2.51;
	private $add = 2.50;
	
	private $hasDefect = 0;
	private $stationsWithDefect = array(0, 0, 0, 0, 0);
	
	private $baseFileName = "Cell1Sensor";
	private $defect = "DefectResults";
	private $timeData = "TimeData";

	public function __construct()
	{
		date_default_timezone_set('America/Chicago');
	}
	
	public function createFiles()
	{
		while($this->carsDone < $this->numCars)
		{
			if ($this->currentCar < $this->numSensors)
			{
				for ($count = 1; $count <= $this->currentCar; $count++)
				{
					if ($this->stationsWithDefect[$count] == 0)
					{
						$fileName = $this->baseFileName . $count . $this->timeData . "-" . date("Ymd") . "T" . date("His") . ".txt";
						$handle = fopen($fileName, 'w');
						fwrite($handle, $this->timeSpent);
						fwrite($handle, " " . ($this->timeSpent + $this->add));
						fclose($handle);
						$fileName = $this->baseFileName . $count . $this->defect . "-" . date("Ymd") . "T" . date("His") . ".txt";
						$handle = fopen($fileName, 'w');
						fwrite($handle, $this->hasDefect);
						fclose($handle);
                        $handle = null;
						sleep($this->waitPeriod);
					}
				}
				$this->timeSpent += $this->add;
				for ($index = $this->numSensors - 1; $index >= 0; $index--)
				{
					if ($this->stationsWithDefect[$index] == 1)
					{
						if ($index != $this->numSensors - 1)
						{
							$this->stationsWithDefect[$index + 1] = 1;
						}
						$this->stationsWithDefect[$index] = 0;
					}
				}
				$this->currentCar++;
			}
			else if ($this->currentCar <= $this->numCars)
			{
				for ($count = 1; $count <= $this->numSensors; $count++)
				{
					if ($this->stationsWithDefect[$count - 1] == 0)
					{
						$fileName = $this->baseFileName . $count . $this->timeData . "-" . date("Ymd") . "T" . date("His") . ".txt";
						$handle = fopen($fileName, 'w');
						fwrite($handle, $this->timeSpent);
						fwrite($handle, " " . ($this->timeSpent + $this->add));
						fclose($handle);
						$fileName = $this->baseFileName . $count . $this->defect . "-" . date("Ymd") . "T" . date("His") . ".txt";
						$handle = fopen($fileName, 'w');
						fwrite($handle, $this->hasDefect);
						fclose($handle);
                        $handle = null;
						sleep($this->waitPeriod);
					}
				}
				$this->timeSpent += $this->add;
				for ($index = $this->numSensors - 1; $index >= 0; $index--)
				{
					if ($this->stationsWithDefect[$index] == 1)
					{
						if ($index != $this->numSensors - 1)
						{
							$this->stationsWithDefect[$index + 1] = 1;
						}
						$this->stationsWithDefect[$index] = 0;
					}
				}
				$this->currentCar++;
				$this->carsDone++;
			}
			else
			{
				for ($count = ($this->carsDone - $this->numSensors + 1); $count <= $this->numSensors; $count++)
				{
					if ($this->stationsWithDefect[$count - 1] == 0)
					{
						$fileName = $this->baseFileName . $count . $this->timeData . "-" . date("Ymd") . "T" . date("His") . ".txt";
						$handle = fopen($fileName, 'w');
						fwrite($handle, $this->timeSpent);
						fwrite($handle, " " . ($this->timeSpent + $this->add));
						fclose($handle);
						$fileName = $this->baseFileName . $count . $this->defect . "-" . date("Ymd") . "T" . date("His") . ".txt";
						$handle = fopen($fileName, 'w');
						fwrite($handle, $this->hasDefect);
						fclose($handle);
                        $handle = null;
						sleep($this->waitPeriod);
					}
				}
				$this->timeSpent += $this->add;
				for ($index = $this->numSensors - 1; $index >= 0; $index--)
				{
					if ($this->stationsWithDefect[$index] == 1)
					{
						if ($index != $this->numSensors - 1)
						{
							$this->stationsWithDefect[$index + 1] = 1;
						}
						$this->stationsWithDefect[$index] = 0;
					}
				}
				$this->carsDone++;
			}
		}
	}
}
?>
