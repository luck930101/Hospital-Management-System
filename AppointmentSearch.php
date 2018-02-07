 <?php

include('connectionHospitalData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>Appoinment Search</title>
  </head>
  
  <body bgcolor="khaki">
  
  

  
<?php
$query = "SELECT a.aid as id ,a.aDate as adate,a.room_num as room ,CONCAT(p.fname,' ',p.lname) as patientname,CONCAT(e.fname,' ',e.lname) as doctorname FROM hospital.appointment a
JOIN employee e ON(a.d_essn= e.essn)
JOIN patient p ON(a.p_id=p.patient_id)
WHERE a.aid = ?;";

$aid=$_POST['aid'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("s",$aid);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>


<h3>
Result of query:
</h3>
<hr>
<?php

$stmt->bind_result($aid,$aDate,$room_num,$p_name,$d_name);
echo "<table border='1'>";

echo "<tr>";

echo "<th> Appoinment Id</th>";
echo "<th> Date</th>";
echo "<th> Room Number</th>";
echo "<th> Patient Name</th>";
echo "<th> Doctor Name</th>";
echo "</tr>";
while($stmt->fetch()){
echo "<tr>";
echo "<th>";
printf("%s",$aid);
echo "</th>";
echo "<th>";
printf("%s",$aDate);
echo "</th>";
echo "<th>";
printf("%s",$room_num);
echo "</th>";
echo "<th>";
printf("%s",$p_name);
echo "</th>";
echo "<th>";
printf("%s",$d_name);
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
	  
