<?php
$db_host = "localhost";
$db_username = "admin";
$db_pass = "";
$db_name = "test";

$con = mysqli_connect($db_host, $db_username, $db_pass, $db_name);
$result = mysqli_query($con, "SELECT * FROM cell1Status");
$row = mysqli_fetch_array($result);
$status = "cell1Station{$row['station']}Status";
if (strcmp($status, "cell1Station1Status") == 0)
{
	echo "They're equal!";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>