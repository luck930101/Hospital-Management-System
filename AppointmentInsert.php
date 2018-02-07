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
$query = "INSERT INTO `hospital`.`appointment` (`aid`, `aDate`, `room_num`, `p_id`, `d_essn`) VALUES (?, ?, ?, ?, ?);";
$aid=$_POST['aid'];
$aDate=$_POST['aDate'];
$room_num=$_POST['room_num'];
$p_id=$_POST['p_id'];
$d_essn=$_POST['d_essn'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("sssss",$aid,$aDate,$room_num,$p_id,$d_essn);
$stmt->execute();
?>





<?php
if(mysqli_affected_rows($mysqli)==1){
echo "<h3>Feedback:</h3>";
echo "<hr>";
echo "Create Appoinment NO.";
print $aid;
echo " Successed!";
echo "<br>";
echo "<hr>";



$query = "SELECT a.aid as id ,a.aDate as adate,a.room_num as room ,CONCAT(p.fname,' ',p.lname) as patientname,CONCAT(e.fname,' ',e.lname) as doctorname FROM hospital.appointment a
JOIN employee e ON(a.d_essn= e.essn)
JOIN patient p ON(a.p_id=p.patient_id)
WHERE a.aid = ?;";

$aid=$_POST['aid'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("s",$aid);
//$brandarray=$_POST['brand'];
$stmt->execute();



$stmt->bind_result($aid,$aDate,$room_num,$p_name,$d_name);
echo "<table border='1'>";

while($stmt->fetch()){
echo "<h3>Appoinmenty date:</h3>";
printf("%s",$aDate);
echo "<h3>Patient name:</h3>";
printf("%s",$p_name);
echo "<br>";
echo "<h3>Doctor name:</h3>";
printf("%s",$d_name);
echo "<h3>Room Number:</h3>";
printf("%s",$room_num);

}

}
else
{
echo "<h3>Warning!</h3>";
echo "<hr>";
echo "Failed to Create Appoinment NO. ";
print $aid;
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
	  
