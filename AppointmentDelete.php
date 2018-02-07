 <?php

include('connectionHospitalData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>Appoinment Delete</title>
  </head>
  
  <body bgcolor="khaki">
  
  
  
  
<?php
$query = "DELETE FROM `hospital`.`appointment` WHERE `aid`= ?;";
$aid=$_POST['aid'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("i",$aid);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>

<?php
if(mysqli_affected_rows($mysqli)==1){
echo "<h3>Feedback:</h3>";
echo "<hr>";
echo "Delete appoinment NO. ";
print $aid;
echo " Successed!";
}
else
{
echo "<h3>Warning!</h3>";
echo "<hr>";
echo "Failed to delete!";
echo "<br>";
echo "<br>";
echo "Appoinment NO. ";
print $aid;
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
	  
