<?php

include('connectionHospitalData.txt');

        $mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>ManuCode Search</title>
  </head>

  <body bgcolor="khaki">




<?php
$query = "SELECT * FROM hospital.manufacture;";

$stmt=$mysqli->prepare($query);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>


<h3>
List of all manufacture:
</h3>
<hr>
<?php

$stmt->bind_result($manu_code,$manu_name);
echo "<table border='1'>";

echo "<tr>";

echo "<th> Manu Code</th>";
echo "<th> Manu Name</th>";
echo "</tr>";
while($stmt->fetch()){
	echo "<tr>";
echo "<th>";
printf("%s",$manu_code);
echo "</th>";
echo "<th>";
printf("%s",$manu_name);
echo "</th>";
echo "</tr>";
}
echo "</table>"
?>


<hr>
<center>
<p>
copyright 2016 Z&Y™
</p>
</center>
</body>
</html>

