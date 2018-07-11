<?PHP  
// CHECK USERNAME OR PASSWORD FROM DATABASE
include 'db.php';	
$json = array();
$POSTDATA = FILE_GET_CONTENTS("PHP://INPUT");
$REQUEST = JSON_DECODE($POSTDATA);
$sno = $REQUEST->sno;
$notes_link= $REQUEST->notes_link;
$extension =$REQUEST->extension;
unlink('notes/'.$notes_link.'.'.$extension);
 $qry="delete from notes where sno='$sno'";

$row=mysql_query($qry,$conn);
echo $row;
?>