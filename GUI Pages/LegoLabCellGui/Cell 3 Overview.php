<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" http-equiv="refresh" content="5">
<title>Cell 3 Overview</title>
<link href="/jquery.mobile-1.3.0/jquery.mobile-1.3.0.min.css" rel="stylesheet" type="text/css"/>
<script src="/jquery.mobile-1.3.0/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/jquery.mobile-1.3.0/jquery.mobile-1.3.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="cellgui.css"/>
</head>

<body>
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
	$stations = mysqli_query($con, "SELECT * FROM station WHERE cell = 3 ORDER BY station");
	
	echo '
	<table class="stationOverview">
	<tr>';
			  
	$count = 0;
	
	while ($stationRow = mysqli_fetch_array($stations))
	{
		$stationId = $stationRow['station_id'];
		$latestInfo = mysqli_query($con, "SELECT * FROM latest_info WHERE station = $stationId");
		$infoRow = mysqli_fetch_array($latestInfo);
		if ($stationRow['station'] != 0)
		{
			echo '
			<td>
			<a href="Cell ' . $stationRow['cell'] . ' Station ' . $stationRow['station'] . '.php" rel="external" data-role="button">
			<table class="station">
			<tr>
			<td width=60%><h2 align="left">Station ' . $stationRow['station'] . ':</h2>
			<p id="overallProcessTime" align="left">Average Process Time: ' . $infoRow['average_process_time'] . '</p>
			<p id="overallIdleTime" align="left">Average Idle Time: ' . $infoRow['average_idle_time'] . '</p>
			<p id="overallTaktTime" align="left">Takt Time: ' . $infoRow['takt_time'] . '</p>
			<p id="overallDailyDefects" align="left">Daily Defects: ' . $infoRow['daily_defect'] . '</p>
			<p>&nbsp;</p>
			</td>';
		}
		else
		{
			echo '
			<td>
			<a href="Cell ' . $stationRow['cell'] . ' Overall.php" rel="external" data-role="button">
			<table class="station">
			<tr>
			<td width=60%><h2 align="left">Overall:</h2>
			<p id="overallProcessTime" align="left">Average Process Time: ' . $infoRow['average_process_time'] . '</p>
			<p id="overallIdleTime" align="left">Average Idle Time: ' . $infoRow['average_idle_time'] . '</p>
			<p id="overallTaktTime" align="left">Takt Time: ' . $infoRow['takt_time'] . '</p>
			<p id="overallDailyDefects" align="left">Daily Defects: ' . $infoRow['daily_defect'] . '</p>
			<p id="overallBottleneckStation" align="left">Bottleneck Station: ' . $infoRow['bottleneck'] . '</p>
			</td>';
		}
		$statusNumber = $infoRow['status'];
		$status = mysqli_query($con, "SELECT status FROM status WHERE status_id = $statusNumber");
		$statusRow = mysqli_fetch_array($status);
		echo '
		<td id="overallStatus" width="40%" class="' . $statusRow['status'] . '">&nbsp;</td>
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

<div data-role="page" id="Cell 3 Overview">
	<div data-role="header">
    	<a href="Cell Overview.php" data-rel="back" data-icon="back">Back</a>
		<h1>Tiger Automotive Lab: Cell 3</h1>
	</div>
	<div data-role="content">
    	<?php display(); ?>
	  <!--<table class="stationOverview">
	    <tr>
	      <td>
          <a href="Cell 3 Overall.php" rel="external" data-role="button">
          <table class="station">
            <tr>
              <td width=60%><h2 align="left">Overall:</h2>
                <p id="overallProcessTime" align="left">Average Process Time:</p>
                <p id="overallIdleTime" align="left">Average Idle Time:</p>
                <p id="overallTaktTime" align="left">Takt Time:</p>
                <p id="overallDailyDefects" align="left">Daily Defects:</p>
                <p id="overallBottleneckStation" align="left">Bottleneck Station:</p>
              </td>
              <td id="overallStatus" width="40%" class="statusOk">&nbsp;</td>
            </tr>
          </table>
          </a>
          </td>
	      <td>
          <a href="Cell 3 Station 1.php" rel="external" data-role="button">
          <table class="station">
            <tr>
              <td width="60%"><h2 align="left">Station 1:</h2>
                <p id="station1ProcessTime" align="left">Average Process Time:</p>
                <p id="station1IdleTime" align="left">Average Idle Time:</p>
                <p id="station1TaktTime" align="left">Takt Time:</p>
                <p id="station1DailyDefects" align="left">Daily Defects:</p>
                <p>&nbsp;</p>
              </td>
              <td id="station1Status" width="40%" class="statusOk">&nbsp;</td>
            </tr>
          </table>
          </a>
          </td>
        </tr>
	    <tr>
	      <td>
          <a href="Cell 3 Station 2.php" rel="external" data-role="button">
          <table class="station">
            <tr>
              <td width="60%"><h2 align="left">Station 2:</h2>
                <p id="station2ProcessTime" align="left">Average Process Time:</p>
                <p id="station2IdleTime" align="left">Average Idle Time:</p>
                <p id="station2TaktTime" align="left">Takt Time:</p>
              	<p id="station2DailyDefects" align="left">Daily Defects:</p>
                <p>&nbsp;</p>
              </td>
              <td id="station2Status" width="40%" class="statusOk">&nbsp;</td>
            </tr>
          </table>
          </a>
          </td>
	      <td>
          <a href="Cell 3 Station 3.php" rel="external" data-role="button">
          <table class="station">
            <tr>
              <td width="60%"><h2 align="left">Station 3:</h2>
                <p id="station3ProcessTime" align="left">Average Process Time:</p>
                <p id="station3IdleTime" align="left">Average Idle Time:</p>
                <p id="station3TaktTime" align="left">Takt Time:</p>
              	<p id="station3DailyDefects" align="left">Daily Defects:</p>
                <p>&nbsp;</p>
              </td>
              <td id="station3Status" width="40%" class="statusOk">&nbsp;</td>
            </tr>
          </table>
          </a>
          </td>
        </tr>
	    <tr>
	      <td>
          <a href="Cell 3 Station 4.php" rel="external" data-role="button">
          <table class="station">
            <tr>
              <td width="60%"><h2 align="left">Station 4:</h2>
                <p id="station4ProcessTime" align="left">Average Process Time:</p>
                <p id="station4IdleTime" align="left">Average Idle Time:</p>
                <p id="station4TaktTime" align="left">Takt Time:</p>
              	<p id="station4DailyDefects" align="left">Daily Defects:</p>
                <p>&nbsp;</p>
              </td>
              <td id="station4Status" width="40%" class="statusOk">&nbsp;</td>
            </tr>
          </table>
          </a>
          </td>
	      <td>
          <a href="Cell 3 Station 5.php" rel="external" data-role="button">
          <table class="station">
            <tr>
              <td width="60%"><h2 align="left">Station 5:</h2>
                <p id="station5ProcessTime" align="left">Average Process Time:</p>
                <p id="station5IdleTime" align="left">Average Idle Time:</p>
                <p id="station5TaktTime" align="left">Takt Time:</p>
              	<p id="station5DailyDefects" align="left"=>Daily Defects:</p>
                <p>&nbsp;</p>
              </td>
              <td id="station5Status" width="40%" class="statusOk">&nbsp;</td>
            </tr>
          </table>
          </a>
          </td>
        </tr>
      </table>-->
  </div>
	<div data-role="footer">
		<h4>Page Footer</h4>
	</div>
</div>
</body>
</html>