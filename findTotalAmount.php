 <?php

include('connectionData.txt');
	
	$mysqli = new mysqli($server, $user, $pass,$dbname,$port);
?>

<html>
<head>
  <title>Another Simple PHP-MySQL Program</title>
  </head>
  
  <body bgcolor="khaki">
  
  
  <hr>
  
  
<?php
$query = "SELECT s.description,CONCAT('$',CASE WHEN SUM(i.total_price)IS NULL THEN 0 ELSE SUM(i.total_price)END) AS tt From stores7.items i 
RIGHT JOIN stores7.stock s USING(stock_num,manu_code)
JOIN stores7.manufact m USING (manu_code)
WHERE m.manu_name = ? GROUP BY s.description;";
$brand=$_POST['brand'];
$stmt=$mysqli->prepare($query);
$stmt->bind_param("s",$brand);
//$brandarray=$_POST['brand'];
$stmt->execute();
?>

<p>
The query for the brand :
<p>

<?php
print $brand;
?>
<hr>
<p>
Result of query:
<p>

<?php

$stmt->bind_result($description,$tt);
echo "<table border='1'>";

echo "<tr>";

echo "<th> Description</th>";
echo "<th> Total Amount</th>";
echo "</tr>";
while($stmt->fetch()){
echo "<tr>";
echo "<th>";
printf("%s",$description);
echo "</th>";
echo "<th>";
printf("%s",$tt);
echo "</th>";
echo "</tr>";
}
echo "</table>"
?>


<p>
<hr>

<p>
 
</body>
</html>
	  
