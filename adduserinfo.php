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
	if($_POST['username']==NULL||$_POST['password']==NULL){
		echo "<script language ='javascript'>";
		echo "window.alert('no input')";
		echo "</script>";
		//require "adduser.php";
	}else{
	$username=$_POST['username'];
	//echo $username;
	$password=$_POST['password'];
	$usertype=$_POST['usertype'];
	$lastname=$_POST['lastname'];
	$firstname=$_POST['firstname'];
	$age=$_POST['age'];
	$telephone=$_POST['telephone'];
	$email=$_POST['email'];
	$sql="select * from user where username='$username'";
	$res=mysql_query($sql)or trigger_error(mysql_error().$sql);;
	$row=mysql_fetch_array($res);
	$userindex=$row['userindex'];
	mysql_query("INSERT INTO `user`.`user` (`username`, `password`, `usertype`, `lastname`, `firstname`, `age`, `telephone`, `email`) 
	VALUES ('$username', '$password', '$usertype', '$lastname', '$firstname','$age', '$telephone', '$email')");
echo"<form>";
echo "Add successful $username";
echo"</form>";	
}
?>