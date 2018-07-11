<?php 
include 'db.php';
	session_start();
	
$POSTDATA = FILE_GET_CONTENTS("PHP://INPUT");
$REQUEST = JSON_DECODE($POSTDATA);
$email = $REQUEST->login_email;
$password= $REQUEST->login_password;

$qry1="select * from admins where email='$email' and password='$password' and email_verify=1";
$row1=mysql_query($qry1,$conn);

$r1=mysql_fetch_array($row1);

	
if($r1[0] != "")
{	
	echo "1";
	 $_SESSION["email"] = $email;
}
else
{
	echo "0";
}

 ?>