<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Cell 1 Overview</title>
<link href="jquery-mobile/jquery.mobile-1.0a3.min.css" rel="stylesheet" type="text/css"/>
<script src="jquery-mobile/jquery-1.5.min.js" type="text/javascript"></script>
<script src="jquery-mobile/jquery.mobile-1.0a3.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="cellgui.css"/>
</head>

<body>
<div data-role="page" id="Cell 1 Overview">
	<div data-role="header">
    	<a href="Cell Overview.php" data-rel="back" data-icon="back">Back</a>
		<h1>Tiger Automotive Lab: Cell 1</h1>
	</div>
	<div data-role="content">
	  <table class="stationOverview">
	    <tr>
	      <td>
          <a href="Cell 1 Overall.php" rel="external" data-role="button">
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
          <a href="Cell 1 Station 1.php" rel="external" data-role="button">
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
          <a href="Cell 1 Station 2.php" rel="external" data-role="button">
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
          <a href="Cell 1 Station 3.php" rel="external" data-role="button">
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
          <a href="Cell 1 Station 4.php" rel="external" data-role="button">
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
          <a href="Cell 1 Station 5.php" rel="external" data-role="button">
          <table class="station">
            <tr>
              <td width="60%"><h2 align="left">Station 5:</h2>
                <p id="station5ProcessTime" align="left">Average Process Time:</p>
                <p id="station5IdleTime" align="left">Average Idle Time:</p>
                <p id="station5TaktTime" align="left">Takt Time:</p>
              	<p id="station5DailyDefects" align="left">Daily Defects:</p>
                <p>&nbsp;</p>
              </td>
              <td id="station5Status" width="40%" class="statusOk">&nbsp;</td>
            </tr>
          </table>
          </a>
          </td>
        </tr>
      </table>
  </div>
	<div data-role="footer">
		<h4>Page Footer</h4>
	</div>
</div>
</body>
</html>