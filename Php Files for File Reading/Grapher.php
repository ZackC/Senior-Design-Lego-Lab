<?php
  set_include_path('jpgraph-3.5.0b1/src/');
  require_once ('jpgraph.php');
  require_once ('jpgraph_line.php');
  /*
   * The class that creates graphs for the GUI.  It returns the graphs to the 
   * standard out. (jp graphs mentions that there is a way to make it go directly to a 
   * file but I couldn't get it to work from initial tests.
   */
  class Grapher
  {
     // the graph to draw
     private $graph;
     // the number of points being drawn on the graph
     private $numberOfPoints;


     // the class that will call the other functions in the correct order to 
     // make the graph
     // $points - the points to plot on the graph
     // $mean - the mean line location on the graph
     // $sigma - the 3 times the standard deviation plus the mean
     // $title - the title of the graph
     // $filename - the file name for the resulting graph
     public function makeGraph($points, $mean, $sigma, $title,$filename)
     {
       $this -> createGraphOfPoints($points);
       $this -> addMeanLine($mean);
       $this -> addSigmaLine($sigma);
       $this -> setTitle($title);
       $this -> drawGraph($filename);
     }


     //creates the graph object and puts the points on the graph.  Needs
     // to be called before the other methods. We can move this to a constructor
     // to inforce that if we want.
     // $points - the points to graph
     public function createGraphOfPoints($points)
     {
 
       $this -> numberOfPoints = count($points);     

       // Size of the overall graph
       $width=350;
       $height=250;
 
       // Create the graph and set a scale.
       // These two calls are always required
       $this -> graph = new Graph($width,$height);
       $this -> graph->SetScale('intlin');
 
       // Create the linear plot
       //echo is_array($points);
       $lineplot = new LinePlot($points);

       $this -> graph->xaxis->title->Set('Car Number'); 
       $this -> graph->yaxis->title->Set('Time');

       // Add the plot to the graph
       $this -> graph -> Add($lineplot);
       $lineplot -> SetColor("#0276FD"); // have to change the color after you add it for some reason
     }

     //outputs the graph to the specified filename
     public function drawGraph($filename)
     {
       $this -> graph -> Stroke($filename);
     }

     // graphs the sigmaValue on the graph as a dotted red line
     public function addSigmaLine($sigmaValue)
     {
        // echo "Nubmer of points: ".$this -> numberOfPoints."\n";
        $sigmaLinePoints = array_fill(0,$this -> numberOfPoints,$sigmaValue);
        //echo is_array($sigmaLinePoints);

        $sigmaLinePlot = new LinePlot($sigmaLinePoints);
        $sigmaLinePlot -> SetStyle('dashed');
        $this -> graph -> Add($sigmaLinePlot);
        $sigmaLinePlot -> SetColor("#FF0000"); // have to change the color after you add it for some reason
        
     }

     // adds the mean line to the graph as an orange line
     public function addMeanLine($meanValue)
     {
       // echo "Nubmer of points: ".$this -> numberOfPoints."\n";
        $meanLinePoints = array_fill(0,$this -> numberOfPoints,$meanValue);
        //echo is_array($sigmaLinePoints);

        $meanLinePlot = new LinePlot($meanLinePoints);
        $this -> graph -> Add($meanLinePlot);
        $meanLinePlot -> SetColor("#FFCC00"); // have to change the color after you add it for some reason.
     }

     // sets the title for the graph
     public function setTitle($title)
     {
       $this -> graph -> title -> Set($title);
     }

  }
?>
