<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" http-equiv="refresh" content="5">
<title>Cell Overview</title>
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
	$cells = mysqli_query($con, "SELECT DISTINCT cell FROM station ORDER BY cell");
	$stations = mysqli_query($con, "SELECT * FROM station ORDER BY cell, station");
	
	while ($cellRow = mysqli_fetch_array($cells))
	{
		echo '
		<a href="Cell ' . $cellRow['cell'] . ' Overview.php" rel="external" data-role="button">
		<h3 align="left">Cell ' . $cellRow['cell'] . ':</h3>
		<table class="cellOverview">
		<tr>';
		while (($stationRow = mysqli_fetch_array($stations)) && $stationRow['cell'] == $cellRow['cell'])
		{
			if ($stationRow['station'] != 0)
			{
				$stationId = $stationRow['station_id'];
				$status = mysqli_query($con, "SELECT status FROM latest_info WHERE station = $stationId");
				$statusRow = mysqli_fetch_array($status);
				$statusNumber = $statusRow['status'];
				$status = mysqli_query($con, "SELECT status FROM status WHERE status_id = $statusNumber");
				$statusRow = mysqli_fetch_array($status);
				echo '
				<td class="' . $statusRow['status'] . '">&nbsp;</td>';
			}
		}
		echo '
		</tr>
		</table>
		</a>';
	}
	echo '
	<h3 align="left">Overall:</h3>';
}
?>

<div data-role="page">
	<div data-role="header">
		<h1>Tiger Automotive Lab Status</h1>
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