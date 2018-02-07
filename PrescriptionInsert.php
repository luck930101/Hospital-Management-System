 <?php

include('connectionHospitalData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>Perscription Insert</title>
  </head>
  
  <body bgcolor="khaki">
  
  
  <hr>
  
  
<?php
$query = "INSERT INTO `hospital`.`perscription` (`prescription_id`, `dia_info`, `aid`) VALUES (?, ?, ?);";
$prescription_id=$_POST['prescription_id'];
$dia_info=$_POST['dia_info'];
$aid=$_POST['aid'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("sss",$prescription_id,$dia_info,$aid);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>
<?php
if(mysqli_affected_rows($mysqli)==1){
echo "<h3>Feedback:</h3>";
echo "<hr>";
echo "Insert perscription NO. ";
print $prescription_id;
echo " Successed!";
}
else
{
echo "<h3>Warning!</h3>";
echo "<hr>";
echo "Failed to create the new perscription!";
}
?>




<hr>
<center>
<p>
copyright 2016 Z&Y™
</p>
</center>
</body>

</body>
</html>
	  
