 <?php

include('connectionHospitalData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>Another Simple PHP-MySQL Program</title>
  </head>
  
  <body bgcolor="khaki">
  
 
<?php
$query = "SELECT fname,lname,sex,phone_num,height,weight,blood_type,job,age from patient where patient_id =?";
$p_id=$_POST['p_id'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("s",$p_id);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>


<h3>
Result of query:
</h3>
<hr>
<?php

$stmt->bind_result($fname,$lname,$sex,$phone_num,$height,$weight,$blood_type,$job,$age);
echo "<table border='1'>";

echo "<tr>";

echo "<th> Fname</th>";
echo "<th> Lname</th>";
echo "<th> Sex</th>";
echo "<th> Phone</th>";
echo "<th> Height</th>";
echo "<th> Weight</th>";
echo "<th> job</th>";
echo "<th> blood_type</th>";
echo "<th> age</th>";
echo "</tr>";
while($stmt->fetch()){
echo "<tr>";
echo "<th>";
printf("%s",$fname);
echo "</th>";
echo "<th>";
printf("%s",$lname);
echo "</th>";
echo "<th>";
printf("%s",$sex);
echo "</th>";
echo "<th>";
printf("%s",$phone_num);
echo "</th>";
echo "<th>";
printf("%s",$height);
echo "</th>";
echo "<th>";
printf("%s",$weight);
echo "</th>";
echo "<th>";
printf("%s",$job);
echo "</th>";
echo "<th>";
printf("%s",$blood_type);
echo "</th>";
echo "<th>";
printf("%s",$age);
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
	  
