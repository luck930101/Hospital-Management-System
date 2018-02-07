 <?php

include('connectionHospitalData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>Item Search</title>
  </head>
  
  <body bgcolor="khaki">
    
  
<?php
$query = "SELECT i.item_name, i.price, i.manu_code, aa.quantity 
FROM item i JOIN (SELECT SUM(i.quantity) quantity, i.i_item_id FROM inventory i GROUP BY i.i_item_id) aa
WHERE i.item_id = aa.i_item_id AND i.item_id = ?";
$item_id=$_POST['item_id'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("s",$item_id);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>

<h3>
Result of query:
</h3>
<hr>
<?php

$stmt->bind_result($item_name,$price,$manu_code,$quantity);
echo "<table border='1'>";

echo "<tr>";

echo "<th> item_name</th>";
echo "<th> price</th>";
echo "<th> manu_code</th>";
echo "<th> quantity</th>";
echo "</tr>";
while($stmt->fetch()){
echo "<tr>";
echo "<th>";
printf("%s",$item_name);
echo "</th>";
echo "<th>";
printf("%s",$price);
echo "</th>";
echo "<th>";
printf("%s",$manu_code);
echo "</th>";
echo "<th>";
printf("%s",$quantity);
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
	  
