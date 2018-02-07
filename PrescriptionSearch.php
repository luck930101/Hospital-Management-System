 <?php

include('connectionHospitalData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>perscription Search</title>
  </head>
  
  <body bgcolor="khaki">
  
  
  
  
<?php
$query = "SELECT prescription_id ,dia_info, aid, CONCAT(p.fname, ' ', p.lname) AS p_name
FROM perscription JOIN appointment USING (aid)
JOIN patient p ON p_id = patient_id
WHERE prescription_id = ?;";
$prescription_id=$_POST['prescription_id'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("s",$prescription_id);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>


<p>
Result of query:
<p>

<?php

$stmt->bind_result($prescription_id,$dia_info,$aid,$pname);
echo "<table border='1'>";

echo "<tr>";

echo "<th> prescription_id</th>";
echo "<th> dia_info</th>";
echo "<th> aid</th>";
echo "<th> patient_name</th>";
echo "</tr>";
while($stmt->fetch()){
echo "<tr>";
echo "<th>";
printf("%s",$prescription_id);
echo "</th>";
echo "<th>";
printf("%s",$dia_info);
echo "</th>";
echo "<th>";
printf("%s",$aid);
echo "</th>";
echo "<th>";
printf("%s",$pname);
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
	  
