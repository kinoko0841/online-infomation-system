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
$sql="select productcategoryname from productcategory";
$res=mysql_query($sql);
//change or delete
if(isset($_POST['Changeproductcategory'])){
	while($row = mysql_fetch_assoc($res)){
		echo '<form action="addproductcategory.php" method="post">';
		foreach($row as $value){
			echo '<input type="radio" name="productcategoryname" value="'.$row['productcategoryname'].'"/>'.$value;
		} 
	echo "<br>";
	}
	echo"<input type='submit' name='changeproductcategory' value='changeproductcategory'>";
	echo"</form>";
}else{
	while($row = mysql_fetch_assoc($res)){
		echo '<form action="deleteproductcategory.php" method="post">';
		foreach($row as $value){
			echo "<input type='checkbox' name='productcategoryname[]' value='$value'/>$value";
		} 
	echo "<br>";
	}
	echo"<input type='submit' name='deleteproductcategory' value='deleteproductcategory' />";
	echo"</form>";
}
//print_r($_POST);
echo "</div>";

?>