<?php
/* Report all errors except E_NOTICE */
error_reporting(E_ALL ^ E_NOTICE ^E_DEPRECATED);
$usertype=$_GET["usertype"];
$age=$_GET["age"];

$con=mysql_connect("cs-server.usc.edu:4844","root","");
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("user", $con);
echo $usertype;
echo $age;
$sql="select * from user";
if(strlen($user)||strlen($age)){
	$sql.=" where ";
}
if($usertype==1){
$sql.="usertype = 'salesmanager'";
	if($age==1){
		$sql.=" and age<30";
	}
	elseif($age==2){
		$sql.="and age between 30 and 40";
	}
	elseif($age==3){
		$sql.="and age between 40 and 50";
	}
	else{
		$sql.="and age > 50";
	}
}
elseif($usertype==2){
$sql.="usertype = 'administrator'";
	if($age==1){
		$sql.=" and age<30";
	}
	elseif($age==2){
		$sql.="and age between 30 and 40";
	}
	elseif($age==3){
		$sql.="and age between 40 and 50";
	}
	else{
		$sql.="and age > 50";
	}
}
elseif($usertype==3){
$sql.="usertype = 'manager'";
	if($age==1){
		$sql.=" and age<30";
	}
	elseif($age==2){
		$sql.="and age between 30 and 40";
	}
	elseif($age==3){
		$sql.="and age between 40 and 50";
	}
	else{
		$sql.="and age > 50";
	}
}

$result = mysql_query($sql);
echo"<form>";
echo "<table border='1'>
<tr>
<th>userid</th>
<th>username</th>
<th>password</th>
<th>user description</th>
<th>lase name</th>
<th>first name</th>
<th>age</th>
<th>telephone</th>
<th>email</th>
</tr>";

while($row = mysql_fetch_assoc($result)){
echo "<tr>";
foreach($row as $value){
 echo "<td>" . $value . "</td>";
}
  echo "</tr>";
}
echo "</table>";
echo"</form>";
mysql_close($con);
?>