<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/stationTemplate.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8" http-equiv="refresh" content="5">
<!-- InstanceBeginEditable name="title" -->
<title>Cell 1 Station 5</title>
<!-- InstanceEndEditable -->
<link href="/jquery.mobile-1.3.0/jquery.mobile-1.3.0.min.css" rel="stylesheet" type="text/css"/>
<script src="/jquery.mobile-1.3.0/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/jquery.mobile-1.3.0/jquery.mobile-1.3.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="cellgui.css"/>
</head>

<body>
<!-- InstanceBeginEditable name="phpCode" -->
<?php
function display()
{
	//Database Information
	$db_host = "localhost";
	$db_username = "admin";
	$db_pass = "";
	$db_name = "test";
	
	//Connect to the database
	$con = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
	$stations = mysqli_query($con, "SELECT station_id FROM station WHERE cell = 1 AND station = 5");
	$station = mysqli_fetch_array($stations);
	$stationId = $station['station_id'];
	$latestInfo = mysqli_query($con, "SELECT * FROM latest_info WHERE station = $stationId");
	$infoRow = mysqli_fetch_array($latestInfo);
	
	echo '
	<table class="station">
	<tr>
	<td>Average Process Time: ' . $infoRow['average_process_time'] . '</td>
	<td>Daily Defects: ' . $infoRow['daily_defect'] . '</td>
	</tr>
	<tr>
	<td>Average Idle Time: ' . $infoRow['average_idle_time'] . '</td>
	<td>Time Since Defect: ' . $infoRow['time_since_defect'] . '</td>
	</tr>
	<tr>
	<td>Takt Time: ' . $infoRow['takt_time'] . '</td>
	</tr>
	</table>
	<p class="centeredImage"><img name="processtimes" src="" width="60%" height="40%" alt="Process Times"></p>
	<p class="centeredImage"><img name="idletimes" src="" width="60%" height="40%" alt="Idle Times"></p>';
}
?>
<!-- InstanceEndEditable -->

<div data-role="page">
	<div data-role="header">
	<!-- InstanceBeginEditable name="headerInfo" -->
    	<a href="Cell 1 Overview.php" data-rel="back" data-icon="back">Back</a>
        <h1>Tiger Automotive Lab: Cell 1 Station 5</h1>
	<!-- InstanceEndEditable -->
    </div>
   	<div data-role="content">
    	<?php display(); ?>
  	</div>
	<div data-role="footer">
		<h4>Page Footer</h4>
	</div>
</div>
</body>
<!-- InstanceEnd --></html>