<?PHP  
// CHECK USERNAME OR PASSWORD FROM DATABASE
include 'db.php';	
session_start();
$POSTDATA = FILE_GET_CONTENTS("PHP://INPUT");
$REQUEST = JSON_DECODE($POSTDATA);
$sub_name = $REQUEST->sub_name;
$email=$_SESSION["email"];
$hash=substr(md5(uniqid(rand(), true)), 16, 16);

echo $qry="insert into sub_names (sub_name,hash,email) values ('$sub_name','$hash','$email')";
$row=mysql_query($qry,$conn);

IF($row)
{
ECHO "1";
}
ELSE {
ECHO "0";
}
?>