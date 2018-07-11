<?PHP  
// CHECK USERNAME OR PASSWORD FROM DATABASE
include 'db.php';	
session_start();
$POSTDATA = FILE_GET_CONTENTS("PHP://INPUT");
$REQUEST = JSON_DECODE($POSTDATA);
$notes_link = $REQUEST->notes_link;

$qry="update notes set downloads=downloads+1 where notes_link='$notes_link'";
$row=mysql_query($qry,$conn);
?>