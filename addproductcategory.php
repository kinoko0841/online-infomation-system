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

//change or add
if(isset($_POST['Addproductcategory'])){
	//require "productcategory.html";
	echo '<form action="addproductcategoryinfo.php" method="post">';
	echo 'Product Category:';
	echo '<input type="text" name="productcategoryname">';
	echo '</br>';
	echo 'Product Category Description:';
	echo '</br>';
	echo '<textarea rows="3" cols="20" name="productcategorydescription"></textarea>';
	echo '</br>';
	echo '<input type="submit" value="Add">';
	echo '</form>';
	//$productcategoryname=$_POST['productcategoryname'];
	//$productcategorydescription=$_POST['productcategorydescription'];

	}else{
	$productcategoryname=$_POST['productcategoryname'];
	$sql="select * from productcategory where productcategoryname='$productcategoryname'";
	$res=mysql_query($sql)or trigger_error(mysql_error().$sql);;
	$row=mysql_fetch_array($res);
	//print_r($row);
	echo '<form action="changeproductcategoryinfo.php" method="post" >';
	echo 'Product Category:';
	echo '<input type="text" name="productcategoryname" value="'.$row['productcategoryname'].'">';
	echo '</br>';
	echo 'Product Category Description:';
	echo '</br>';
	echo '<textarea rows="3" cols="20" name="productcategorydescription" value="'.$row['productcategorydescription'].'"></textarea>';
	echo '</br>';
	echo '<input type="submit" value="Change">';
	echo '</form>';
	//$productcategoryname=$_POST['productcategoryname'];
	//$productcategorydescription=$_POST['productcategorydescription'];

}
?>
