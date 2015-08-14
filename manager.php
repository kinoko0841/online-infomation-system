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
<img src="WebBannernew.jpg" >
</form>
<?php 
echo "<form>";
echo "</br>Welcome,manager". $_POST['username'];
echo "</form>";
?>
<form action="viewuser.php"name="Viewuser" method="post">
<input type="submit" name="Viewuser" value="Viewuser">
</form>
<form action="viewproduct.php"name="Viewproduct" method="post">
<input type="submit" name="Viewproduct" value="Viewproduct">
</form>
<form action="viewspecialsales.php"name="viewspecialsales"method="post">
<input type="submit" name="viewspecialsales" value="viewspecialsales">
</form>
</div>
</html>
