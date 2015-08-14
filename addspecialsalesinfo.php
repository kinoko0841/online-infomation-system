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

<?php
/* Report all errors except E_NOTICE */
error_reporting(E_ALL ^ E_NOTICE ^E_DEPRECATED);
//connection to sql
$con=mysql_connect("cs-server.usc.edu:4844","root","");
//check if connection fail
mysql_select_db("user",$con);
	if($_POST['salesprice']==NULL){
		echo "<script language ='javascript'>";
		echo "window.alert('no input')";
		echo "</script>";
		//require "addspecialsales.php";
	}else{
	$productid=$_POST['productid'];
	//echo $productcategoryid;
	$salesprice=$_POST['salesprice'];
	$startdate=$_POST['startdate'];
	$enddate=$_POST['enddate'];
	$sql="select * from specialsales where productid='$productid'";
	$res=mysql_query($sql)or trigger_error(mysql_error().$sql);;
	$row=mysql_fetch_array($res);
	$specialsalesid=$row['specialsalesid'];
	//print_r($row);
	mysql_query("INSERT INTO `user`.`specialsales` (`productid`, `salesprice`, `startdate`, `enddate`) 
	VALUES ('$productid', '$salesprice', '$startdate', '$enddate')");
echo"<form>";
echo "Add successful $productid";
	echo"</form>";
}
?>