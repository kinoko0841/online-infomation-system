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

<!--The javascript is referred from w3school website-->
<script>


function showUser(str,str1,str2,str3,str4)
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
xmlhttp.open("GET","getspecialsales.php?productcategory="+str+"&price="+str1+"&productname="+str2+"&startdate="+str3+"&enddate="+str4,true);
xmlhttp.send();
}



</script>

<?php
/* Report all errors except E_NOTICE */
error_reporting(E_ALL ^ E_NOTICE ^E_DEPRECATED);
//connection to sql
$con=mysql_connect("cs-server.usc.edu:4844","root","");
//check if connection fail
mysql_select_db("user",$con);
//search by category
echo '<form onchange="showUser(productcategory.value,price.value,productname.value,startdate.value,enddate.value)">'; 
echo 'Select a category:';
$sql="select * from productcategory";
$res=mysql_query($sql);
echo '<select name="productcategory" onchange="showUser(this.value)">';
echo '<option value=""></option>';
while($row = mysql_fetch_assoc($res)){
		
	$productcategoryid=$row['productcategoryid'];
	echo "<option value='$productcategoryid'/>".$row['productcategoryname'];
	echo "<br>";
	}
echo '</select>';

//search by price
 
echo 'Select a price range:';
echo '<select name="price" >';
echo '<option value=""></option>';
echo '<option value="1">less than 5</option>';
echo '<option value="2">5-10</option>';
echo '<option value="3">10-50</option>';
echo '<option value="4">More than 50</option>';
echo '</select>';

//search by product
 
echo 'Select a name:';
$sql="select productname from product";
$res=mysql_query($sql);
echo '<select name="productname" >';
echo '<option value=""></option>';
while($row = mysql_fetch_assoc($res)){
		foreach($row as $value){
		echo "<option value='$value'/>".$value;
		} 
	echo "<br>";
	}
echo '</select>';

//search by startdate
 
echo 'Select a start date:';
echo '<select name="startdate" >';
echo '<option value=""></option>';
echo '<option value="1">2014-05</option>';
echo '<option value="2">2014-06</option>';
echo '<option value="3">2014-07</option>';
echo '<option value="4">2014-08</option>';
echo '</select>';

//search by enddate

echo 'Select a price range:';
echo '<select name="enddate" >';
echo '<option value=""></option>';
echo '<option value="1">2014-05</option>';
echo '<option value="2">2014-06</option>';
echo '<option value="3">2014-07</option>';
echo '<option value="4">2014-08</option>';
echo '</select>';
echo '</form>';

echo'<p>';
echo'<div id="txtHint"><b>Product info will be listed here.</b></div>';
echo'</p>';

?>