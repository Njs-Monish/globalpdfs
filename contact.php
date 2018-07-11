<?PHP  
// CHECK USERNAME OR PASSWORD FROM DATABASE
include 'db.php';	

$POSTDATA = FILE_GET_CONTENTS("PHP://INPUT");
$REQUEST = JSON_DECODE($POSTDATA);
$name = $REQUEST->name;
$email = $REQUEST->email;
$comment= $REQUEST->comments;
$qry="insert into comments (name,email,comment) values ('$name','$email','$comment')";
$row=mysql_query($qry,$conn);

IF($row)
{
ECHO "1";
}
ELSE {
ECHO "0";
}
?>