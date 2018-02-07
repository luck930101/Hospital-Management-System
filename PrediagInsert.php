 <?php

include('connectionHospitalData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>Another Simple PHP-MySQL Program</title>
  </head>
  
  <body bgcolor="khaki">
  
  
  <hr>
  
  
<?php
$query = "INSERT INTO `hospital`.`pre_diagnose` (`Pdiagnosis_id`, `Pdate`, `n_essn`, `r_essn`) VALUES (?, ?, ?, ?);";
$Pdiagnosis_id=$_POST['Pdiagnosis_id'];
$Pdate=$_POST['Pdate'];
$n_essn=$_POST['n_essn'];
$r_essn=$_POST['r_essn'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("isii",$Pdiagnosis_id,$Pdate,$n_essn,$r_essn);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>

<?php
if(mysqli_affected_rows($mysqli)==1){
echo "<h3>Feedback:</h3>";
echo "<hr>";
echo "Insert prediagnose ";
print $Pdiagnosis_id;
echo " Successed!";
}
else
{
echo "<h3>Warning!</h3>";
echo "<hr>";
echo "Failed to create the new prediagnose!";
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
	  
