 <?php

include('connectionHospitalData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>Employee Search</title>
  </head>
  
  <body bgcolor="khaki">
  
  
  
<?php
$query = "SELECT essn, fname, lname, sex, email, phonenumber, d.d_name
FROM employee JOIN department d USING(d_num)
WHERE essn = ?";
$brand=$_POST['brand'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("s",$brand);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>


<h3>
Result of query:
</h3>
<hr>
<?php

$stmt->bind_result($essn,$fname,$lname,$sex,$email,$phonenumber,$dname);
echo "<table border='1'>";

echo "<tr>";

echo "<th> essn</th>";
echo "<th> fname</th>";
echo "<th> lname</th>";
echo "<th> sex</th>";
echo "<th> email</th>";
echo "<th> phonenumber</th>";
echo "<th> department</th>";
echo "</tr>";
while($stmt->fetch()){
echo "<tr>";
echo "<th>";
printf("%s",$essn);
echo "</th>";
echo "<th>";
printf("%s",$fname);
echo "</th>";
echo "<th>";
printf("%s",$lname);
echo "</th>";
echo "<th>";
printf("%s",$sex);
echo "</th>";
echo "<th>";
printf("%s",$email);
echo "</th>";
echo "<th>";
printf("%s",$phonenumber);
echo "</th>";
echo "<th>";
printf("%s",$dname);
echo "</th>";
echo "</tr>";
}
echo "</table>"
?>

<hr>
<center>
<p>
copyright 2016 Z&Y™
</p>
</center>
</body>
</html>
	  
