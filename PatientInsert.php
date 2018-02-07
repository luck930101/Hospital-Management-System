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
$query = "INSERT INTO `hospital`.`patient` (`patient_id`, `fname`, `lname`, `sex`, `phone_num`, `height`, `weight`, `blood_type`, `job`, `age`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
";
$patient_id=$_POST['patient_id'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$sex=$_POST['sex'];
$phone_num=$_POST['phone_num'];
$height=$_POST['height'];
$weight=$_POST['weight'];
$blood_type=$_POST['blood_type'];
$job=$_POST['job'];
$age=$_POST['age'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("isssssssss",$patient_id,$fname,$lname,$sex,$phone_num,$height,$weight,$blood_type,$job,$age);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>

<?php
if(mysqli_affected_rows($mysqli)==1){
echo "<h3>Feedback:</h3>";
echo "<hr>";
echo "Insert patient ";
print $fname;
echo " ";
print $lname;
echo " Successed!";
}
else
{
echo "<h3>Warning!</h3>";
echo "<hr>";
echo "Failed to insert patient ";
print $fname;
echo " ";
print $lname;
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
	 
