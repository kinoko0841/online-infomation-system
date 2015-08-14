<?php
/* Report all errors except E_NOTICE */
error_reporting(E_ALL ^ E_NOTICE ^E_DEPRECATED);
$productcategory=$_GET["productcategory"];
$price=$_GET["price"];
$productname=$_GET["productname"];
$startdate=$_GET["startdate"];
$enddate=$_GET["enddate"];
$con=mysql_connect("cs-server.usc.edu:4844","root","");
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("user", $con);

$sql1="select * from specialsales";
$result = mysql_query($sql);
//$result2 = mysql_query($sql2);
//$where="";



$where='';
$sql2='select * from specialsales';
if(strlen($productname)>0||strlen($productcategory)>0||strlen($price)>0||strlen($startdate)>0||strlen($enddate)>0){
	$sql2.=" where ";
	}
//search category	
if(strlen($productcategory)>0){
	if(strlen($where)>0){
	$where.=" and ";
	}
	$sql="SELECT productid FROM product WHERE productcategoryid = '$productcategory'";
	$res=mysql_query($sql);
	$row = mysql_fetch_assoc($res);
	$id=$row['productid'];
	$where .=" productid = '$id'";
		
	
	
}

//search product	
if(strlen($productname)>0){
	if(strlen($where)>0){
	$where.=" and ";
	}
	$sql="SELECT productid FROM product WHERE productname = '$productname'";
	$res=mysql_query($sql);
	while($row = mysql_fetch_assoc($res)){
		if(strlen($where)>0){
			$where.=" and ";
		}
		$id=$row['productid'];
		$where .=" productid = '$id'";
		
	}
	
}
//search price
if(strlen($price)>0){
	if(strlen($where)>0){
	$where.=" and ";
	}
	if($price==1){
			$where.="  salesprice<5";
		}
		elseif($price==2){
			$where.="  salesprice between 5 and 10";
		}
		elseif($price==3){
			$where.="  salesprice between 10 and 50";
		}
		else{
			$where.="  salesprice > 50";
		}
	}
//search startdate	
if(strlen($startdate)>0){
	if(strlen($where)>0){
	$where.=" and ";
	}	
		if($startdate==1){
		$where.="  startdate between '2014-05-00' and '2014-06-00'";
		}
		elseif($startdate==2){
		$where.="  startdate between '2014-06-01' and '2014-07-01'";
		}
		elseif($startdate==3){
		$where.="  startdate between '2014-07-00' and '2014-08-00'";
		}
		else{
		$where.="  startdate between '2014-08-00' and '2014-09-00'";
		}
	}
//search enddate	
	if(strlen($enddate)>0){
	if(strlen($where)>0){
	$where.=" and ";
	}
		if($enddate==1){
		$where.=" enddate between '2014-05-00' and '2014-06-00'";
		}
		elseif($enddate==2){
		$where.=" enddate between '2014-06-01' and '2014-07-01'";
		}
		elseif($enddate==3){
		$where.=" enddate between '2014-07-00' and '2014-08-00'";
		}
		else{
		$where.=" enddate between '2014-08-00' and '2014-09-00'";
		}
	}
	$sql2.=$where;
	$res2 = mysql_query($sql2);
	echo"<form>";
	echo "<table border='1'>
<tr>
<th>Specialsalesid</th>
<th>Productid</th>
<th>salesprice</th>
<th>startdate</th>
<th>enddate</th>
</tr>";
	//echo "$sql2";
		while($row2 = mysql_fetch_assoc($res2)){
			echo "<tr>";
			foreach($row2 as $value){
			echo "<td>" . $value . "</td>";
			}
			echo "</tr>";
		}
		

echo "</table>";
echo"</form>";
mysql_close($con);
?>