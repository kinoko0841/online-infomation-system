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

<script text="javascript">
function checkvalidation(){
	if(document.f1.productdescription.value==""){
		window.alert("Input productdescription")
		return false;
	}
	if(document.f2.productdescription.value==""){
		window.alert("Input productdescription")
		return false;
	}
}

</script>

<?php
/* Report all errors except E_NOTICE */
error_reporting(E_ALL ^ E_NOTICE ^E_DEPRECATED);
//connection to sql
$con=mysql_connect("cs-server.usc.edu:4844","root","");
//check if connection fail
mysql_select_db("user",$con);

//change or add
if(isset($_POST['Addproduct'])){


	echo '<form name="f1" action="addproductinfo.php" method="post">';
	echo 'productcategory:';
	echo '<select name="productcategoryid" >';
	//build selection list
	$sql="select productcategoryid from productcategory";
	$res=mysql_query($sql)or trigger_error(mysql_error().$sql);;
	//$row=mysql_fetch_array($res);
	while($row=mysql_fetch_assoc($res)){
		foreach($row as $value){
			echo "<option value='$value'>";
			echo "$value";
			echo "</option>";
		}
	}
	echo '</select>';
	echo '</br>';
	echo 'Product name:';
	echo '<input type="text" name="productname">';
	echo '</br>';
	echo 'Product Description:';
	echo '</br>';
	echo '<textarea rows="3" cols="20" name="productdescription"></textarea>';
	echo '</br>';
	echo 'Product Price:';
	echo '</br>';
	echo '<input type="text" name="productprice">';
	echo '</br>';
	echo '<input type="submit" value="add" onsubmit="checkvalidation()">';
	echo "</form>";



	//mysql_query("INSERT INTO `user`.`product` (`productcategoryid`, `productname`, `productdescription`, `productprice`) 
	//VALUES ('$productcategory', '$productname', '$productdescription', '$productprice')");
	
	}else{
		$productname=$_POST['productname'];
		$sql="select * from product where productname='$productname'";
		$res=mysql_query($sql)or trigger_error(mysql_error().$sql);;
		$row=mysql_fetch_array($res);
		//echo $row;
		$productcategoryid=$row['productcategoryid'];
		//echo $productcategoryid;
		$productdescription=$row['productdescription'];
		$productprice=$row['productprice'];
		echo '<form name="f2" action="changeproductinfo.php" method="post">';
	echo 'productcategory:';
	echo "<select name='productcategoryid' selected='$productcategoryid'>";
	$sql1="select productcategoryid from productcategory";
	$res1=mysql_query($sql1)or trigger_error(mysql_error().$sql1);;
	//$row1=mysql_fetch_array($res1);	
	//print_r($row1);
	while($row1=mysql_fetch_assoc($res1)){
		foreach($row1 as $value){
			echo "<option value='$value'>";
			echo "$value";
			echo "</option>";
		}
	}
	echo '</select>';
	echo '</br>';
	echo 'Product name:';
	echo "<input type='text' name='productname' value='$productname'>";
	echo '</br>';
	echo 'Product Description:';
	echo '</br>';
	echo "<textarea rows='3' cols='20' name='productdescription' value='$productdescription'></textarea>";
	echo '</br>';
	echo 'Product Price:';
	echo "<input type='text' name='productprice' value='$productprice'>";
	echo '<input type="submit" value="Change" onsubmit="checkvalidation()">';
	echo "</form>";
	}
?>
