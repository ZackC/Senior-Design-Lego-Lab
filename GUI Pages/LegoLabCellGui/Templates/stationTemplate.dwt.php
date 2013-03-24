<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" http-equiv="refresh" content="5">
<!-- TemplateBeginEditable name="docTitle" -->
<title>Cell # Station #</title>
<!-- TemplateEndEditable -->
<link href="/jquery.mobile-1.3.0/jquery.mobile-1.3.0.min.css" rel="stylesheet" type="text/css"/>
<script src="/jquery.mobile-1.3.0/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/jquery.mobile-1.3.0/jquery.mobile-1.3.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="cellgui.css"/>
</head>

<body>
<div data-role="page" id=title>
	<div data-role="header">
		<!-- TemplateBeginEditable name="backAndHeader" -->
    	<a href="Cell # Overview.php" data-rel="back" data-icon="back">Back</a>
        <h1>Tiger Automotive Lab: Cell # Station #</h1>
		<!-- TemplateEndEditable -->
    </div>
	<div data-role="content">
	  <table class="station">
	    <tr>
	      <td id="processTime">Average Process Time: </td>
	      <td id="dailyDefects">Daily Defects: </td>
        </tr>
	    <tr>
	      <td id="idleTime">Average Idle Time: </td>
	      <td id="defectTime">Time Since Defect: </td>
        </tr>
	    <tr>
	      <td id="taktTime">Takt Time: </td>
        </tr>
      </table>
      <p class="centeredImage"><img name="processtimes" src="" width="60%" height="40%" alt="Process Times"></p>
      <p class="centeredImage"><img name="idletimes" src="" width="60%" height="40%" alt="Idle Times"></p>
  	</div>
	<div data-role="footer">
		<h4>Page Footer</h4>
	</div>
</div>
</body>
<!--<script>
window.setInterval(test, 4000);
function test()
{
	var obj=document.getElementById("processTime");
	var txt=document.createTextNode("This is a test.");
	obj.appendChild(txt);
}
</script>-->
</html>