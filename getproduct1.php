<?php
/* Report all errors except E_NOTICE */
error_reporting(E_ALL ^ E_NOTICE ^E_DEPRECATED);
$q=$_GET["q"];

$con=mysql_connect("cs-server.usc.edu:4844","root","");
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("user", $con);
//echo $q;
if($q==1){
$sql="SELECT * FROM product WHERE productprice<5";
}
elseif($q==2){
$sql="SELECT * FROM product WHERE productprice between 5 and 10";
}
elseif($q==3){
$sql="SELECT * FROM product WHERE productprice between 10 and 50";
}
else{
$sql="SELECT * FROM product WHERE productprice > 50";
}
$result = mysql_query($sql);
echo"<form>";
echo "<table border='1'>
<tr>
<th>Productid</th>
<th>Productcategory</th>
<th>product name</th>
<th>product description</th>
<th>product price</th>
</tr>";

while($row = mysql_fetch_assoc($result)){
echo "<tr>";
foreach($row as $value){
 echo "<td>" . $value . "</td>";
}
  echo "</tr>";
}
echo "</table>";
echo"</form>";
mysql_close($con);
?>