<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Cell Overview</title>
<link href="jquery-mobile/jquery.mobile-1.0a3.min.css" rel="stylesheet" type="text/css"/>
<script src="jquery-mobile/jquery-1.5.min.js" type="text/javascript"></script>
<script src="jquery-mobile/jquery.mobile-1.0a3.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="cellgui.css"/>
</head>

<body>
<?php
$db_host = "localhost";
$db_username = "admin";
$db_pass = "";
$db_name = "test";
$cell1Station1Status = "statusOk";
$cell1Station2Status = "statusOk";
$cell1Station3Status = "statusOk";
$cell1Station4Status = "statusOk";
$cell1Station5Status = "statusOk";
$cell2Station1Status = "statusOk";
$cell2Station2Status = "statusOk";
$cell2Station3Status = "statusOk";
$cell2Station4Status = "statusOk";
$cell2Station5Status = "statusOk";
$cell3Station1Status = "statusOk";
$cell3Station2Status = "statusOk";
$cell3Station3Status = "statusOk";
$cell3Station4Status = "statusOk";
$cell3Station5Status = "statusOk";

function checkStatus()
{
	$db_host = "localhost";
$db_username = "admin";
$db_pass = "";
$db_name = "test";

	$con = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
	$result = mysqli_query($con, "SELECT * FROM cell1Status");
	$row = mysqli_fetch_array($result);
	$status = "cell1Station{$row['station']}Status";
	$test = "cell1Station1Status";
	$GLOBALS['cell1Station1Status'] = "statusWarning";
	//$GLOBALS[$status] = "statusWarning";
	
	var_dump($status);
	echo "<br/>";
	var_dump(strcmp($status, "cell1Station1Status"));
	die();
	if (strcmp($status, "cell1Station1Status") == 0)
	{
		$GLOBALS['cell1Station1Status'] = "statusWarning";
	}
	//$GLOBALS['cell1Station1Status'] = "statusWarning";
	//while($row = mysqli_fetch_array($result))
	//{
		//$status = "cell1Station{$row['station']}Status";
		//$GLOBALS['$status'] = $row['status'];
	//}
}

checkStatus();
?>

<div data-role="page" id="Cell Overview">
	<div data-role="header">
		<h1>Tiger Automotive Lab Status</h1>
	</div>
	<div data-role="content">
	  <a href="Cell 1 Overview.php" rel="external" data-role="button">
	  <h3 align="left">Cell 1:</h3>
      <table class="cellOverview">
	    <tr>
	      <td id="cell1Station1" class="<?php echo $cell1Station1Status; ?>">&nbsp;</td>
	      <td id="cell1Station2" class="<?php echo $cell1Station2Status; ?>">&nbsp;</td>
	      <td id="cell1Station3" class="<?php echo $cell1Station3Status; ?>">&nbsp;</td>
	      <td id="cell1Station4" class="<?php echo $cell1Station4Status; ?>">&nbsp;</td>
	      <td id="cell1Station5" class="<?php echo $cell1Station5Status; ?>">&nbsp;</td>
        </tr>
      </table>
      </a>
      <a href="Cell 2 Overview.php" rel="external" data-role="button">
      <h3 align="left">Cell 2:</h3>
	  <table class="cellOverview">
	    <tr>
	      <td id="cell2Station1" class="<?php echo $cell2Station1Status; ?>">&nbsp;</td>
	      <td id="cell2Station2" class="<?php echo $cell2Station2Status; ?>">&nbsp;</td>
	      <td id="cell2Station3" class="<?php echo $cell2Station3Status; ?>">&nbsp;</td>
	      <td id="cell2Station4" class="<?php echo $cell2Station4Status; ?>">&nbsp;</td>
	      <td id="cell2Station5" class="<?php echo $cell2Station5Status; ?>">&nbsp;</td>
        </tr>
      </table>
      </a>
      <a href="Cell 3 Overview.php" rel="external" data-role="button">
	  <h3 align="left">Cell 3:</h3>
	  <table class="cellOverview">
	    <tr>
	      <td id="cell3Station1" class="<?php echo $cell3Station1Status; ?>">&nbsp;</td>
	      <td id="cell3Station2" class="<?php echo $cell3Station2Status; ?>">&nbsp;</td>
	      <td id="cell3Station3" class="<?php echo $cell3Station3Status; ?>">&nbsp;</td>
	      <td id="cell3Station4" class="<?php echo $cell3Station4Status; ?>">&nbsp;</td>
	      <td id="cell3Station5" class="<?php echo $cell3Station5Status; ?>">&nbsp;</td>
        </tr>
      </table>
      </a>
      <h3 align="left">Overall:</h3>
    </div>
	<div data-role="footer">
		<h4>Page Footer</h4>
	</div>
</div>
</body>
<!--<script>
var number = 1;
window.setInterval(makeRequest, 5000);
function makeRequest()
{
	jQuery.getJSON("http://localhost/LegoLabCellGui/serverCode.php" + "?callback=?", {"Number": number}, function(replyData){displayData(replyData);});
	//jQuery.ajax({type: "POST", dataType: "json", url: "http://localhost/LegoLabCellGui/testServer.php", data: {"Number": number}, success: function(replyData){alert(replyData.responseText); displayData(replyData);}, error: function(replyData, status, err){alert(replyData + status + err);}});
}
function displayData(replyData)
{
	document.getElementById("test1").innerHTML = "Average Process Time: " + replyData.APT;
	if (replyData.Color == "yellow")
	{
		document.getElementById("test2").style.backgroundColor = "#FFFF00";
	}
}
</script>-->
</html>