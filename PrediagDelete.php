 <?php

include('connectionHospitalData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>Pred_delete</title>
  </head>
  
  <body bgcolor="khaki">
  
  
  <hr>
  
  
<?php
$query = "DELETE FROM `hospital`.`pre_diagnose` WHERE `Pdiagnosis_id`= ?;";
$Pdiagnosis_id=$_POST['Pdiagnosis_id'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("i",$Pdiagnosis_id);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>
<?php
if(mysqli_affected_rows($mysqli)==1){
echo "<h3>Feedback:</h3>";
echo "<hr>";
echo "Delete prediagnose ";
print $essn;
echo " Successed!";
}
else
{
echo "<h3>Warning!</h3>";
echo "<hr>";
echo "Failed to delete!";
echo "<br>";
echo "<br>";
echo "prediagnose ";
print $Pdiagnosis_id;
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
	  
