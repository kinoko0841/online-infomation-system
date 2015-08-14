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

<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<style type="text/css">
body{
background-image:url(background-fast-food-24106439.jpg);
}
</style>

<?php
/* Report all errors except E_NOTICE */
error_reporting(E_ALL ^ E_NOTICE ^E_DEPRECATED);
//connection to sql
$con=mysql_connect("cs-server.usc.edu:4844","root","");
//check if connection fail
mysql_select_db("user",$con);
	if($_POST['productname']==NULL){
		echo "<script language ='javascript'>";
		echo "window.alert('no input')";
		echo "</script>";
		//require "addproduct.php";
	}else{
	$productcategoryid=$_POST['productcategoryid'];
	//echo $productcategoryid;
	$productname=$_POST['productname'];
	$productdescription=$_POST['productdescription'];
	$productprice=$_POST['productprice'];
	$sql="select * from product where productname='$productname'";
	$res=mysql_query($sql)or trigger_error(mysql_error().$sql);;
	$row=mysql_fetch_array($res);
	$productid=$row['productid'];
	//print_r($row);
	mysql_query("INSERT INTO `user`.`product` (`productcategoryid`, `productname`, `productdescription`, `productprice`) 
	VALUES ('$productcategoryid', '$productname', '$productdescription', '$productprice')");
echo"<form>";
echo "Add successful $productname";
echo"</form>";	
}
?>