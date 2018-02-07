 <?php

include('connectionHospitalData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>Prediag Search</title>
  </head>
  
  <body bgcolor="khaki">
  
  
  
  
<?php
$query = "SELECT Pdiagnosis_id, Pdate, CONCAT(e1.fname , ' ' , e1.lname) AS n_name, CONCAT(e2.fname , ' ' ,e2.lname) AS r_name
FROM pre_diagnose JOIN employee e1 ON e1.essn = n_essn
JOIN employee e2 ON e2.essn = r_essn
WHERE Pdiagnosis_id = ?";
$pre_id=$_POST['pre_id'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("s",$pre_id);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>


<p>
Result of query:
<p>

<?php

$stmt->bind_result($Pdiagnosis_id,$Pdate,$n_name,$r_name);
echo "<table border='1'>";

echo "<tr>";

echo "<th> Pdiagnosis_id</th>";
echo "<th> Pdate</th>";
echo "<th> nurse_name</th>";
echo "<th> receptionist_name</th>";
echo "</tr>";
while($stmt->fetch()){
echo "<tr>";
echo "<th>";
printf("%s",$Pdiagnosis_id);
echo "</th>";
echo "<th>";
printf("%s",$Pdate);
echo "</th>";
echo "<th>";
printf("%s",$n_name);
echo "</th>";
echo "<th>";
printf("%s",$r_name);
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
	  
