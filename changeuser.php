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
$sql="select username from user";
$res=mysql_query($sql);
$user="";
//change or delete
if(isset($_POST['Changeuser'])){
	while($row = mysql_fetch_assoc($res)){
		echo '<form action="adduser.php" method="post">';
		foreach($row as $value){
			echo '<input type="radio" name="username" value="'.$row['username'].'"/>'.$value;
		} 
	echo "<br>";
	}
	echo"<input type='submit' name='changeuser' value='changeuser'>";
	echo"</form>";
}else{
	while($row = mysql_fetch_assoc($res)){
		echo '<form action="deleteuser.php" method="post">';
		foreach($row as $value){
			echo "<input type='checkbox' name='username[]' value='$value'/>$value";
		} 
	echo "<br>";
	}
	echo"<input type='submit' name='deleteuser' value='deleteuser' />";
	echo"</form>";
}
//print_r($_POST);
echo "</div>";

?>