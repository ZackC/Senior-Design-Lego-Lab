<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" http-equiv="refresh" content="5">
<title>Cell Overview</title>
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
	$cellResult = mysqli_query($con, "SELECT * FROM cells");
	
	while ($cellRow = mysqli_fetch_array($cellResult))
	{
		echo '<a href="Cell ' . $cellRow['cell_number'] . ' Overview.php" rel="external" data-role="button">
	          <h3 align="left">Cell ' . $cellRow['cell_number'] . ':</h3>
              <table class="cellOverview">
	            <tr>
	              <td id="cell' . $cellRow['cell_number'] . 'Station1" class="statusOk">&nbsp;</td>
	              <td id="cell' . $cellRow['cell_number'] . 'Station2" class="statusWarning">&nbsp;</td>
	              <td id="cell' . $cellRow['cell_number'] . 'Station3" class="statusAlert">&nbsp;</td>
	              <td id="cell' . $cellRow['cell_number'] . 'Station4" class="statusDefect">&nbsp;</td>
	              <td id="cell' . $cellRow['cell_number'] . 'Station5" class="statusOk">&nbsp;</td>
               </tr>
             </table>
             </a>';
	}
}
?>

<div data-role="page" id="Cell Overview">
	<div data-role="header">
		<h1>Tiger Automotive Lab Status</h1>
	</div>
	<div data-role="content">
    	<?php display(); ?>
    	<h3 align="left">Overall:</h3>
    </div>
	<div data-role="footer">
		<h4>Page Footer</h4>
	</div>
</div>
</body>
</html>