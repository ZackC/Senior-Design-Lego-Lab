<?php
  /*
   * Performs the calculations for the graphs and a little bit for the GUI
   * May move the GUI calculation to another class later
   */
  class GraphCalculation
  {
    //the nubmer of data points that has been recorded in the test run
    private $numberOfDataPoints;
    // the total value of adding all of the data points in the test run
    private $totalCountOfDataPoints;
    // the number of data points that will be displayed on the graph
    private $numberOfPointsToChart = 10;
    // the number of data points that will be displayed.  Will always
    // be equal to or less than numberOfPointsToChart.  This value
    // is used to see if there is less than the ideal number of points
    // to plot
    private $countOfPointsInChart;
    // the array of the points to plot.  This array is updated every time
    // a new data point comes in. It only holds the last nubmerOfPointsToChart
    // data points that the object has received.
    private $lastPointsForChartArray = array();
    
    // constructs the object and initialized some values to 0
    public function  __construct()
    {
       $this -> numberOfDataPoints = 0;
       $this -> totalCountOfDataPoints = 0;
       $this -> countOfPointsInChart = 0;
    } 

    // adds the data point to the object.  This method increments the total and 
    // the count.  It also adds the value to the last points array and removes 
    // a value if necessary
    public function addDataPoint($data)
    {
       $this -> numberOfDataPoints = $this -> numberOfDataPoints + 1;
       $this -> totalCountOfDataPoints = $this -> totalCountOfDataPoints + $data;
       //if full - remove then add
       if($this -> countOfPointsInChart  == $this -> numberOfPointsToChart)
       {
         array_shift($this -> lastPointsForChartArray);
         array_push($this -> lastPointsForChartArray ,$data);
       }
       //else - just add
       else
       {
         array_push($this -> lastPointsForChartArray ,$data);
         $this -> countOfPointsInChart = $this -> countOfPointsInChart + 1;
       }
    }

    // returns the mean of the data points
    public function calculateMean()
    {
      return $this -> totalCountOfDataPoints/$this -> numberOfDataPoints;
    }
 
    //returns the standard deviation of the data points
    public function calculateStandardDeviation()
    {
      $result = array_fill(0,$this -> countOfPointsInChart, $this -> calculateMean());
      $result = array_map('standardDeviationSquare',$this -> lastPointsForChartArray, $result);
      $result = array_sum($result);
     //echo "The result is: ".$result."\n";
      return sqrt($result/$this -> countOfPointsInChart);
    }

    //returns the sigma limit value - multiplies the stardard deviation by an amount
    //$number - the amount to multiply it by
    public function getSigmaLimit($number)
    {
      return $number * $this -> calculateStandardDeviation();
    }

    //returns the nubmer of data points in the object
    public function getNumberOfDataPoints()
    {
      return $this -> numberOfDataPoints;
    }

    //returns the total count of the data points
    public function getTotalCountOfDataPoints()
    {
      return $this -> totalCountOfDataPoints;
    }
    
    //returns the count of points in the chart
    public function getCountOfPointsInChart()
    {
      return $this -> countOfPointsInChart;
    }

    //returns the array of points stored
    public function getLastPointsForChartArray()
    {
      return $this -> lastPointsForChartArray;
    }

    //This function returns true if the process is out of control according
    // to the Shewhart Control Chart rules and false other wise.
    //this function need to have as least 6 points to work
    // I haven't tested this function yet.
    // Assuming this function is called every time the program runs
    // we also need to ask how long they get to get a base before throwing
    // these errors.
    public function isSystemOutOfControl()
    {
       //check if last added value is outside 3 sigmas
       if($this -> lastPointsForChartArray[$this -> countOfPointsInChart - 1] 
             > $this -> getSigmaLimit(3));
       {
         return TRUE;
       }
       // see if last 2 out of 3 points were past 2 sigmas
       $count = 0;
       for($i = $this -> countOfPointsInChart - 3; $i < $this -> countOfPointsInChart; 
               $i++)
       {
         if($this -> lastPointsForChartArray[$i] > $this -> getSigmaLimit(2))
         {
           $count = $count + 1;
         }
         if($count == 2)
         {
           return TRUE;
         } 
       }
       // see if 4 of last 5 are beyond 1 sigma
       $count = 0;
       for($i = $this -> countOfPointsInChart - 5; $i < $this -> countOfPointsInChart; 
               $i++)
       {
         if($this -> lastPointsForChartArray[$i] > $this -> getSigmaLimit(1))
         {
           $count = $count + 1;
         }
         if($count == 4)
         {
           return TRUE;
         } 
       }
       // see if last six points are increasing
       $lastValue = 0;
       for($i = $this -> countOfPointsInChart - 5; $i < $this -> countOfPointsInChart; 
               $i++)
       {
         if($lastValue = 0)
         {
           $lastValue = $this -> lastPointsForChartArray[$i];
         }
         else if($this -> lastPointsForChartArray[$i] > $lastValue) 
         {
           $lastValue = $this -> lastPointsForChartArray[$i];
         }
         else
         {
           break;
         }
         if($i == $this -> countOfPointsInChart - 1)
         {
           return TRUE;
         } 
       }
       return FALSE;
    }

  }
    //this function returns the square of the difference of the mean for the standard
    //deviation calculation.  It is outside the class so that the name can be a callable
    //for the array_map function in calculateStandardDeviation.
    //$x - the value 
    //$mean - the mean of the set
    function standardDeviationSquare($x,$mean)
    {
      return pow($x - $mean,2);
    }
?>
