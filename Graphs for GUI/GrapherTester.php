<?php
  //this script tests the grapher class
  function my_autoloader($class)
  {
    include realpath(dirname(__FILE__))."/".$class.'.php';
  }

  spl_autoload_register('my_autoloader');
  $gc = new GraphCalculation();
  $grapher = new Grapher();
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
  $grapher -> createGraphsOfPoints($gc -> getLastPointsForChartArray());
  $grapher -> addSigmaLine($gc -> getSigmaLimit(3) + $gc -> calculateMean());
  $grapher -> addMeanLine($gc -> calculateMean());
  $grapher -> drawGraph();
?>
