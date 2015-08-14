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


<head>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<style type="text/css">
body{
background-image:url(background-fast-food-24106439.jpg);
}
</style>
<html>
<div id="all">
<form>
<img src="WebBannernew.jpg">
</form>
<?php 
echo '<form>';
echo "</br>Welcome,Sales Manager". $_POST['username'];
echo '</form>';
?>
<form action="addproduct.php"name="Addproduct" method="post">
<input type="submit" name="Addproduct" value="Addproduct">
</form>
<form action="changeproduct.php"name="Changeproduct"method="post">
<input type="submit" name="Changeproduct" value="Changeproduct">
</form>
<form action="changeproduct.php"name="Deleteproduct"method="post">
<input type="submit" name="Deleteproduct" value="Deleteproduct">
</form>
<form action="viewproduct.php"name="Viewproduct"method="post">
<input type="submit" name="Viewproduct" value="Viewproduct">
</form>
<form action="addproductcategory.php"name="Addproductcategory"method="post">
<input type="submit" name="Addproductcategory" value="Addproductcategory">
</form>
<form action="changeproductcategory.php"name="Changeproductcategory"method="post">
<input type="submit" name="Changeproductcategory" value="Changeproductcategory">
</form>
<form action="changeproductcategory.php"name="Deleteproductcategory"method="post">
<input type="submit" name="Deleteproductcategory" value="Deleteproductcategory">
</form>
<form action="viewproductcategory.php"name="Viewproductcategory"method="post">
<input type="submit" name="Viewproductcategory" value="Viewproductcategory">
</form>
<form action="addspecialsales.php"name="addspecialsales"method="post">
<input type="submit" name="addspecialsales" value="addspecialsales">
</form>
<form action="changespecialsales.php"name="changespecialsales"method="post">
<input type="submit" name="changespecialsales" value="changespecialsales">
</form>
<form action="changespecialsales.php"name="deletespecialsales"method="post">
<input type="submit" name="deletespecialsales" value="deletespecialsales">
</form>
<form action="viewspecialsales.php"name="viewspecialsales"method="post">
<input type="submit" name="viewspecialsales" value="viewspecialsales">
</form>
</div>
</html>
