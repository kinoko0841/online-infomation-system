<?php
/* Report all errors except E_NOTICE */
error_reporting(E_ALL ^ E_NOTICE ^E_DEPRECATED);
//check if timeout
session_start();
$t=time();
if($t-$_SESSION["time"]>200){
echo "logout by system!";
require"login.php";
session_destroy();
}?>

<script text="javascript">
function checkvalidation(){
	if(document.f1.username.value==""){
		window.alert("Input username")
		return;
	}
	if(document.f1.password.value==""){
		window.alert("Input password")
		return;
	}
}
</script>

<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<style type="text/css">
body{
background-image:url(background-fast-food-24106439.jpg);
}
</style>

<script>
function showUser(str)
{ 
var xmlHttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getproduct.php?q="+str,true);
xmlhttp.send();
}

function showUser1(str)
{ 
var xmlHttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getproduct1.php?q="+str,true);
xmlhttp.send();
}

function showUser2(str)
{ 
var xmlHttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getproduct2.php?q="+str,true);
xmlhttp.send();
}
</script>
<?php
/*echo "<div>";
echo"<th>user</th>";
//connection to sql
$con=mysql_connect("cs-server.usc.edu:4844","root","");
//check if connection fail
mysql_select_db("user",$con);
$sql="select * from product";
$res=mysql_query($sql);
//print_r(mysql_fetch_assoc($res));
echo "<table border='1'>";
while($row = mysql_fetch_assoc($res)){
	//print_r(mysql_fetch_array($res));
    echo "<tr>";
    foreach($row as $value){
    echo "<td>$value</td>";
  } 
   echo "</tr>";
}
echo "</table>";
echo "</div>";*/
/* Report all errors except E_NOTICE */
error_reporting(E_ALL ^ E_NOTICE ^E_DEPRECATED);
//connection to sql
$con=mysql_connect("cs-server.usc.edu:4844","root","");
//check if connection fail
mysql_select_db("user",$con);
//search by category
echo '<form>'; 
echo 'Select a category:';
$sql="select * from productcategory";
$res=mysql_query($sql);
echo '<select name="productcategory" onchange="showUser(this.value)">';
while($row = mysql_fetch_assoc($res)){
		
	$productcategoryid=$row['productcategoryid'];
	echo "<option value='$productcategoryid'/>".$row['productcategoryname'];
	echo "<br>";
	}
echo '</select>';
echo '</form>';
//search by price
echo '<form>'; 
echo 'Select a price range:';
echo '<select name="users" onchange="showUser1(this.value)">';
echo '<option value="1">less than 5</option>';
echo '<option value="2">5-10</option>';
echo '<option value="3">10-50</option>';
echo '<option value="4">More than 50</option>';
echo '</select>';
echo '</form>';
//search by product
echo '<form>'; 
echo 'Select a name:';
$sql="select productname from product";
$res=mysql_query($sql);
echo '<select name="productname" onchange="showUser2(this.value)">';
while($row = mysql_fetch_assoc($res)){
		foreach($row as $value){
		echo "<option value='$value'/>".$value;
		} 
	echo "<br>";
	}
echo '</select>';
echo '</form>';

echo'<p>';
echo'<div id="txtHint"><b>Product info will be listed here.</b></div>';
echo'</p>';
?>