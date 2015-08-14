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
//connection to sql
$con=mysql_connect("cs-server.usc.edu:4844","root","");
//check if connection fail
mysql_select_db("user",$con);
$sql="select productid from specialsales";
$res=mysql_query($sql);

//change or delete
if(isset($_POST['changespecialsales'])){
	while($row = mysql_fetch_assoc($res)){
		echo '<form action="addspecialsales.php" method="post">';
		foreach($row as $value){
			$sql1="select * from product where productid='$value'";
			$res1=mysql_query($sql1)or trigger_error(mysql_error().$sql1);;
			$row1=mysql_fetch_array($res1);
			echo '<input type="radio" name="productid" value="'.$row['productid'].'"/>'.$row1['productname'];
		} 
	echo "<br>";
	}
	echo"<input type='submit' name='changeproduct' value='changeproduct'>";
	echo"</form>";
}else{
	while($row = mysql_fetch_assoc($res)){
		echo '<form action="deletespecialsales.php" method="post">';
		foreach($row as $value){
			$sql1="select * from product where productid='$value'";
			$res1=mysql_query($sql1)or trigger_error(mysql_error().$sql1);;
			$row1=mysql_fetch_array($res1);
			echo '<input type="checkbox" name="productid[]" value="'.$row['productid'].'"/>'.$row1['productname'];
		} 
	echo "<br>";
	}
	echo"<input type='submit' name='deletespecialsales' value='deletespecialsales' />";
	echo"</form>";
}
//print_r($_POST);
echo "</div>";

?>