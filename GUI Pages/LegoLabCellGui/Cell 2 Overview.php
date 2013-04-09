<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" http-equiv="refresh" content="5">
<title>Cell 2 Overview</title>
<link href="../jquery.mobile-1.3.0/jquery.mobile-1.3.0.min.css" rel="stylesheet" type="text/css"/>
<script src="../jquery.mobile-1.3.0/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="../jquery.mobile-1.3.0/jquery.mobile-1.3.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="cellgui.css"/>
</head>

<body>
<?php
function display()
{
	//Database Information
	$db_host = "localhost";
	$db_username = "LegoLab";
	$db_pass = "";
	$db_name = "legolab";
	
	//Connect to the database
	$con = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
	$stations = mysqli_query($con, "SELECT * FROM station WHERE cell = 2 ORDER BY station");
	
	echo '
	<table class="stationOverview">
	<tr>';
			  
	date_default_timezone_set('America/Chicago');
	$count = 0;
	
	while ($stationRow = mysqli_fetch_array($stations))
	{
		$stationId = $stationRow['station_id'];
		$latestInfo = mysqli_query($con, "SELECT * FROM latest_info WHERE station = $stationId");
		$infoRow = mysqli_fetch_array($latestInfo);
		$currentTime = date("His");
		$timeDifference = $currentTime - $infoRow['time_since_defect'];
		$timeDifference = date("H:i:s");
		if ($stationRow['station'] != 0)
		{
			echo '
			<td>
			<a href="Cell ' . $stationRow['cell'] . ' Station ' . $stationRow['station'] . '.php" rel="external" data-role="button">
			<table class="station">
			<tr>
			<td width=60%><h2 align="left">Station ' . $stationRow['station'] . ':</h2>
			<p align="left">Average Process Time: ' . $infoRow['average_process_time'] . '</p>
			<p align="left">Average Idle Time: ' . $infoRow['average_idle_time'] . '</p>
			<p align="left">Takt Time: ' . $infoRow['takt_time'] . '</p>
			<p align="left">Daily Defects: ' . $infoRow['daily_defect'] . '</p>
			<p align="left">Time Since Defect: ' . $timeDifference . '</p>
			<p>&nbsp;</p>
			</td>';
		}
		else
		{
			//Need to put column for cycle time for overall cell. Change from takt_time in code
			echo '
			<td>
			<a href="Cell ' . $stationRow['cell'] . ' Overall.php" rel="external" data-role="button">
			<table class="station">
			<tr>
			<td width=60%><h2 align="left">Overall:</h2>
			<p align="left">Average Process Time: ' . $infoRow['average_process_time'] . '</p>
			<p align="left">Average Idle Time: ' . $infoRow['average_idle_time'] . '</p>
			<p align="left">Cycle Time: ' . $infoRow['takt_time'] . '</p>
			<p align="left">Daily Defects: ' . $infoRow['daily_defect'] . '</p>
			<p align="left">Time Since Defect: ' . $timeDifference . '</p>
			<p align="left">Bottleneck Station: ' . $infoRow['bottleneck'] . '</p>
			</td>';
		}
		$statusNumber = $infoRow['status'];
		$status = mysqli_query($con, "SELECT status FROM status WHERE status_id = $statusNumber");
		$statusRow = mysqli_fetch_array($status);
		echo '
		<td width="40%" class="' . $statusRow['status'] . '">&nbsp;</td>
		</tr>
		</table>
		</a>
		</td>';
		if ($count % 2 != 0)
		{
			echo '
			</tr>
			<tr>';
		}
		$count++;
	}
	
	echo '
	</tr>
	</table>';
}
?>

<div data-role="page">
	<div data-role="header">
    	<a href="Cell Overview.php" data-rel="back" data-icon="back">Back</a>
		<h1>Tiger Automotive Lab: Cell 2</h1>
	</div>
	<div data-role="content">
    	<?php display(); ?>
  </div>
	<div data-role="footer">
		<h4>Page Footer</h4>
	</div>
</div>
</body>
</html>