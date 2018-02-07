 <?php

include('connectionHospitalData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>Another Simple PHP-MySQL Program</title>
  </head>
  
  <body bgcolor="khaki">
  <h3>Feedback:</h3>
  
  <hr>
  
  
<?php
$query = "INSERT INTO `hospital`.`employee` (`essn`, `fname`, `lname`, `sex`, `email`, `phonenumber`,`d_num`) VALUES (?, ?, ?, ?, ?, ?,?);
";
$essn=$_POST['essn'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$sex=$_POST['sex'];
$email=$_POST['email'];
$phonenumber=$_POST['phonenumber'];
$d_num=$_POST['d_num'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("issssss",$essn,$fname,$lname,$sex,$email,$phonenumber,$d_num);
$stmt->execute();
?>

<?php
if(mysqli_affected_rows($mysqli)==1){
echo "Insert employee ";
print $fname;
echo "  ";
print $lname;
echo " Successed!";
}
else 
{
echo "Failed to insert employee";
print $fname;
echo "  ";
print $lname;
echo "!";
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
	  
