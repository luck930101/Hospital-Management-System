 <?php

include('connectionHospitalData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>Perscription Delete</title>
  </head>
  
  <body bgcolor="khaki">
  
  
  <hr>
  
  
<?php
$query = "DELETE FROM `hospital`.`perscription` WHERE `prescription_id`= ?;";
$prescription_id=$_POST['prescription_id'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("i",$prescription_id);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>
<?php
if(mysqli_affected_rows($mysqli)==1){
echo "<h3>Feedback:</h3>";
echo "<hr>";
echo "Delete perscription ";
print $prescription_id;
echo " Successed!";
}
else
{
echo "<h3>Warning!</h3>";
echo "<hr>";
echo "Failed to delete!";
echo "<br>";
echo "<br>";
echo "perscription NO. ";
print $prescription_id;
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
	  
