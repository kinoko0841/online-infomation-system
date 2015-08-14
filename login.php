<?php
session_start();
$_SESSION["adminname"]="";
$_SESSION["adminpwd"]="";
$_SESSION["time"]=time();
?>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<?php
/* Report all errors except E_NOTICE */
error_reporting(E_ALL ^ E_NOTICE ^E_DEPRECATED);
//print_r(mysql_fetch_row($res));
//login part
$username="";
$password="";
$username=$_POST["username"];
$password=$_POST["password"];
$_SESSION["adminname"]=$_POST["username"];
$_SESSION["adminpwd"]=$_POST["password"];
$errmsg="";

if(strlen($username)==0){
	$errmsg='Invalid Login!';
}
if(strlen($password)==0){
	$errmsg='Invalid Login!';
}
if((strlen($username)==0)&&(strlen($password)==0)){
	$errmsg='';
}
if((strlen($username)>0)&&(strlen($password)>0)){
	//connection to sql
	$con=mysql_connect("cs-server.usc.edu:4844","root","");
	//check if connection fail
	mysql_select_db("user",$con);
	$sql="select * from user where username='$username'and password='$password'";
	$res=mysql_query($sql)or trigger_error(mysql_error().$sql);;

	if(!($row=mysql_fetch_array($res))){
		//no rows retrieved
		$errmsg='Invalid Login!';
	}
}



if(strlen($errmsg)>0){
	//send back to login page with error
	require'prelogin.html';
	echo"<form>$errmsg</form>";
	require"postlogin.html";
}
elseif(!$res){
	//didn't talk to DB
	require'prelogin.html';
	require'postlogin.html';
}
else{
	//valid username, display appropriate page
	//require 'edit.php';
	session_start();
	$_SESSION["adminname"]=true;
	$_SESSION["adminpwd"]=true;
	$_SESSION["time"]=time();
	$usertype = $row['usertype'];
	switch($usertype){
		case administrator:
			require'admin.php';
			break;
		case salesmanager:
			require'salesmanager.php';
			break;
		case manager:
			require'manager.php';
			break;
	
			
	}
}

?>
