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
		window.alert("Input username")
		var u1 = document.getElementById('u1').value;
		var u2 = document.getElementById('u2').value;
		var p1 = document.getElementById('p1').value;
		var p2 = document.getElementById('p2').value;
	if(u1.value==""){
		window.alert("Input username")
		return;
	}
	if(u2.value==""){
		window.alert("Input password")
		return;
	}
	if(p1.value==""){
		window.alert("Input username")
		return;
	}
	if(p2.value==""){
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

//change or add
if(isset($_POST['Adduser'])){
	//require "user.php";
	echo '<form action="adduserinfo.php" method="post" >';
	echo 'Username:<input type="text" name="username" id="u1" value="">';
	echo 'Password:<input type="text" name="password" id="p1" value="">';
	echo 'usertype:';
	echo '<select name="usertype" selected="'.$row['usertype'].'">';
	echo '<option value="administrator">administrator</option>';
	echo '<option value="manager">manager</option>';
	echo '<option value="salesmanager">salesmanager</option>';
	echo '</select>'; 
	echo '</br>';
	echo 'Lastname:<input type="text" name="lastname" value="">';
	echo 'Firstname:<input type="text" name="firstname" value="'.$row['firstname'].'">';
	echo '</br>';
	echo 'Age:<input type="text" name="age" value="">';
	echo 'Telephone:<input type="text" name="telephone" value="">';
	echo 'Email:<input type="text" name="email" value="">';
	echo "<input type='submit' value='add' onsubmit='checkvalidation'/>";
	echo '</form>';
	//mysql_query("INSERT INTO `user`.`user` (`username`, `password`, `usertype`, `lastname`, `firstname`, `age`, `telephone`, `email`) 
	//VALUES ('$username', '$password', '$usertype', '$lastname', '$firstname','$age', '$telephone', '$email')");

	}else{
	$username=$_POST['username'];
	$sql="select * from user where username='$username'";
	$res=mysql_query($sql)or trigger_error(mysql_error().$sql);;
	$row=mysql_fetch_array($res);
	echo '<form action="changeuserinfo.php" method="post" name="f2">';
	echo 'Username:<input type="text" name="username" id="u2" value="'.$row['username'].'">';
	echo 'Password:<input type="text" name="password" id="p2" value="'.$row['password'].'">';
	echo 'usertype:';
	echo '<select name="usertype" selected="'.$row['usertype'].'">';
	echo '<option value="administrator">administrator</option>';
	echo '<option value="manager">manager</option>';
	echo '<option value="salesmanager">salesmanager</option>';
	echo '</select>'; 
	echo '</br>';
	echo 'Lastname:<input type="text" name="lastname" value="'.$row['lastname'].'">';
	echo 'Firstname:<input type="text" name="firstname" value="'.$row['firstname'].'">';
	echo '</br>';
	echo 'Age:<input type="text" name="age" value="'.$row['age'].'">';
	echo 'Telephone:<input type="text" name="telephone" value="'.$row['telephone'].'">';
	echo 'Email:<input type="text" name="email" value="'.$row['email'].'">';
	echo "<input type='submit' value='change' onsubmit='checkvalidation'/>";
	echo '</form>';


}
?>
