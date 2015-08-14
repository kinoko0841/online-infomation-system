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
	if(document.f1.salesprice.value==""){
		window.alert("Input salesprice")
		return;
	}
	if(document.f2.salesprice.value==""){
		window.alert("Input salesprice")
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
if(isset($_POST['addspecialsales'])){


	echo '<form name="f1" action="addspecialsalesinfo.php" method="post">';
	echo 'productname:';
	echo '<select name="productid" >';
	//build selection list
	$sql="select productid from product";
	$res=mysql_query($sql)or trigger_error(mysql_error().$sql);;
	//$row=mysql_fetch_array($res);
	while($row=mysql_fetch_assoc($res)){
		foreach($row as $value){
			$sql1="select productname from product where productid='$value'";
			$res1=mysql_query($sql1)or trigger_error(mysql_error().$sql);;
			$row1=mysql_fetch_assoc($res1);
			$productname=$row1['productname'];
			echo "<option value='$value'>";
			echo "$productname";
			echo "</option>";
			
		}
	}
	echo '</select>';
	echo '</br>';
	echo 'Sales price:';
	echo '</br>';
	echo '<input type="text" name="salesprice">';
	echo '</br>';
	echo 'start date:';
	echo '</br>';
	echo '<input type="text" name="startdate">';
	echo '</br>';
	echo 'end date:';
	echo '</br>';
	echo '<input type="text" name="enddate">';
	echo '</br>';
	echo '<input type="submit" value="add" onsubmit="checkvalidation()">';
	echo "</form>";



	//mysql_query("INSERT INTO `user`.`product` (`productcategoryid`, `productname`, `productdescription`, `productprice`) 
	//VALUES ('$productcategory', '$productname', '$productdescription', '$productprice')");
	
	}else{
	$productid=$_POST['productid'];
	$sql2="select * from specialsales where productid='$productid'";
	$res2=mysql_query($sql2)or trigger_error(mysql_error().$sql2);;
	$row2=mysql_fetch_assoc($res2);
	$salesprice=$row2['salesprice'];
	$startdate=$row2['startdate'];
	$enddate=$row2['enddate'];
	echo '<form name="f2" action="changespecialsalesinfo.php" method="post">';
	echo 'productname:';
	echo $produtid;
	echo "<select name='productid'>";
	//build selection list
	$sql="select productid from product";
	$res=mysql_query($sql)or trigger_error(mysql_error().$sql);;
	//$row=mysql_fetch_array($res);
	while($row=mysql_fetch_assoc($res)){
		foreach($row as $value){
			$sql1="select productname from product where productid='$value'";
			$res1=mysql_query($sql1)or trigger_error(mysql_error().$sql);;
			$row1=mysql_fetch_assoc($res1);
			$productname=$row1['productname'];
			if($value!=$productid){
			echo "<option value='$value'>";
			echo "$productname";
			echo "</option>";
			}else{
			echo "<option value='$value' selected='selected'>";
			echo "$productname";
			echo "</option>";
			}
			
		}
	}
	echo '</select>';
	echo '</br>';
	echo 'sales price:';
	echo "<input type='text' name='salesprice' value='$salesprice'>";
	echo '</br>';
	echo 'Start date:';
	echo '</br>';
	echo "<input type='text' name='startdate' value='$startdate'>";
	echo '</br>';
	echo 'End date:';
	echo '</br>';
	echo "<input type='text' name='enddate' value='$enddate'>";
	echo '</br>';
	echo '<input type="submit" value="Change" onsubmit="checkvalidation()">';
	echo "</form>";
	}
?>
