 <?php

include('connectionHospitalData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>Item Delete</title>
  </head>
  
  <body bgcolor="khaki">
  
  
<?php
$query = "DELETE FROM `hospital`.`item` WHERE `item_id`=?;";
$item_id=$_POST['item_id'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("s",$item_id);
//$brandarray=$_POST['brand'];
//add
$stmt->execute();
?>


<?php
if(mysqli_affected_rows($mysqli)==1){
echo "<h3>Feedback:</h3>";
echo "<hr>";
echo "Delete item ";
print $item_id;
echo " Successed!";
}
else
{
echo "<h3>Warning!</h3>";
echo "<hr>";
echo "Failed to delete!";
echo "<br>";
echo "<br>";
echo "Item ";
print $item_id;
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
	  
