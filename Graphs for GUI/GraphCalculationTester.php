<?php
  /*
   *  This script tests the graph calculation class.
   */
   
  function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
  $gc = new GraphCalculation();
  $gc -> addDataPoint(56.40);
  $gc -> addDataPoint(46.30);
  $gc -> addDataPoint(59.20);
  $gc -> addDataPoint(52.20);
  $gc -> addDataPoint(46.78);
  $gc -> addDataPoint(43.23);
  $gc -> addDataPoint(46.78);
  $gc -> addDataPoint(55.28);
  $gc -> addDataPoint(51.82);
  $gc -> addDataPoint(53.35);
  $gc -> addDataPoint(50.00);

  $result = $gc -> getNumberOfDataPoints();
  echo "Number of Data Points: ".$result."\n";
  $result = $gc -> getTotalCountOfDataPoints();
  echo "Total Count of Data Points: ".$result."\n"; 
  $result = $gc -> getCountOfPointsInChart();
  echo "Count of Points in Chart: ".$result."\n"; 
  $result = $gc -> getLastPointsForChartArray();
  for($i = 0; $i < count($result); $i++)
  {
    echo "Points for chart: ".$result[$i]."\n";
  }  
  $result = $gc -> calculateMean();
  echo "Mean: ".$result."\n";


  $gc2 = new GraphCalculation();
  $gc2 -> addDataPoint(12);
  $gc2 -> addDataPoint(8);
  $gc2 -> addDataPoint(10);
  $result = $gc2 -> calculateMean();
  echo "The mean of gc2 is: ".$result."\n";
  $result = $gc2 -> calculateStandardDeviation();
  echo "The standard deviation of gc2 is: ".$result."\n";
  $result = $gc2 -> getSigmaLimit(3);
  echo "The 3rd sigma limit of gc2 is: ".$result."\n";
?>
