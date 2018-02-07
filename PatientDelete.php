 <?php

include('connectionHospitalData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>Patient Delete</title>
  </head>
  
  <body bgcolor="khaki">
  
<?php
$query = "DELETE FROM `hospital`.`patient` WHERE `patient_id`=?;";
$patient_id=$_POST['patient_id'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("s",$patient_id);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>
<?php
if(mysqli_affected_rows($mysqli)==1){
echo "<h3>Feedback:</h3>";
echo "<hr>";
echo "Delete patient ";
print $patient_id;
echo " Successed!";
}
else
{
echo "<h3>Warning!</h3>";
echo "<hr>";
echo "Failed to delete!";
echo "<br>";
echo "<br>";
echo "Patient ";
print $patient_id;
echo " does not exist!";
}
?>




<hr>
<center>
<p>
copyright 2016 Z&Y™
</p>
</center> 
</body>
</html>
	  
