<head>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<style type="text/css">
body{
background-image:url(background-fast-food-24106439.jpg);
}
</style>
<html>
<body>
<div id="all">
<?php 
echo "Welcome,administrator".$_POST['username'];
?>
<form action="adduser.php"name="Adduser" method="post">
<input type="submit" name="Adduser" value="Adduser">
</form>
<form action="changeuser.php"name="Changeuser" method="post">
<input type="submit" name="Changeuser" value="Changeuser">
</form>
<form action="changeuser.php"name="Deleteuser" method="post">
<input type="submit" name="Deleteuser" value="Deleteuser">
</form>
<form action="viewuser.php"name="Viewuser" method="post">
<input type="submit" name="Viewuser" value="Viewuser">
</form>
</div>
</body>
</html>
