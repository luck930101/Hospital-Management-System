 <?php

include('connectionHospitalData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>Item Insert</title>
  </head>
  
  <body bgcolor="khaki">
  
  
<?php
$query = "INSERT INTO `hospital`.`item` (`item_id`, `item_name`, `price`, `manu_code`) VALUES (?, ?, ?, ?);";
$item_id=$_POST['item_id'];
$item_name=$_POST['item_name'];
$price=$_POST['price'];
$manu_code=$_POST['manu_code'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("isss",$item_id,$item_name,$price,$manu_code);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>
<?php
if(mysqli_affected_rows($mysqli)==1){
echo "<h3>Feedback:</h3>";
echo "<hr>";
echo "Insert Item ";
print $item_id;
echo " Successed!";
}
else
{
echo "<h3>Warning!</h3>";
echo "<hr>";
echo "Failed to insert item ";
print $item_id;
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
	  
