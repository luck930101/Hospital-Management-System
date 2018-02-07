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

$query = "DELETE FROM `hospital`.`employee` WHERE `essn`=?;";
$essn=$_POST['essn'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("s",$essn);
$stmt->execute();
?>

<?php 
if(mysqli_affected_rows($mysqli)==1){
echo "<h3>Feedback:</h3>";
echo "<hr>";
echo "Delete employee ";
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
echo "Employee ";
print $essn;
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
	  
