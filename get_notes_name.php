<?PHP  
// CHECK USERNAME OR PASSWORD FROM DATABASE
include 'db.php';	
$json = array();
$POSTDATA = FILE_GET_CONTENTS("PHP://INPUT");
$REQUEST = JSON_DECODE($POSTDATA);
$hash = $REQUEST->hash_notes;

$qry="select notes_name,sno,notes_link,extension from notes where hash='$hash'";
$row=mysql_query($qry,$conn);
while($r=mysql_fetch_array($row))
{
	$json []= array(
        'notes_name' => $r[0],
        'sno' => $r[1],
        'notes_link'=>$r[2],
        'extension'=>$r[3]
     
       
    );
	
}

$jsonstring = json_encode($json);
echo $jsonstring;
?>