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
	$productid=$_POST['productid'];
	$salesprice=$_POST['salesprice'];
	$startdate=$_POST['startdate'];
	$enddate=$_POST['enddate'];
	$sql="select * from specialsales where productid='$productid'";
	$res=mysql_query($sql)or trigger_error(mysql_error().$sql);;
	$row=mysql_fetch_array($res);
	$specialsalesid=$row['specialsalesid'];
	mysql_query("UPDATE `user`.`specialsales` SET `productid`='$productid', 
	`salesprice`='$salesprice', `startdate`='$startdate', `enddate`='$enddate'
	 WHERE `specialsales`.`specialsalesid` = '$specialsalesid'");
	 echo"<form>";
echo "change successful $productname";
echo"</form>";
	

?>