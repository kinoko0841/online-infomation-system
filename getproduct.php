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

$sql="SELECT productcategoryid FROM productcategory WHERE productcategoryid = '".$q."'";
//echo $q;
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

while($row = mysql_fetch_assoc($result))
 {
 $productcategoryid=$row['productcategoryid'];
 $sql1="select * from product where productcategoryid='$productcategoryid'";
 $res1=mysql_query($sql1);
 while($row1 = mysql_fetch_assoc($res1)){
 echo "<tr>";
 foreach($row1 as $value){
 echo "<td>" . $value . "</td>";
 }
}
 echo "</tr>";
 }
echo "</table>";
echo"</form>";
mysql_close($con);
?>