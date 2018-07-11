<?PHP  
// CHECK USERNAME OR PASSWORD FROM DATABASE
include 'db.php';	
session_start();
$POSTDATA = FILE_GET_CONTENTS("PHP://INPUT");
$REQUEST = JSON_DECODE($POSTDATA);
$name = $REQUEST->pro_name;
$password= $REQUEST->pro_password;

$designation= $REQUEST->designation;
$ins= $REQUEST->ins;
$email= $_SESSION["email"];

echo $qry="update admins set name='$name',designation='$designation',instuition='$ins',password='$password' where email='$email'";
$row=mysql_query($qry,$conn);

IF($row)
{
ECHO "1";
}
ELSE {
ECHO "0";
}
?>