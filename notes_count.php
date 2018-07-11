<?PHP  
// CHECK USERNAME OR PASSWORD FROM DATABASE
include 'db.php';	
$json = array();
$POSTDATA = FILE_GET_CONTENTS("PHP://INPUT");
$REQUEST = JSON_DECODE($POSTDATA);
$qry1="select count(*),sum(downloads) from notes";
$row=mysql_query($qry1,$conn);
	
	while($r=mysql_fetch_array($row))
	{
	$json []= array(
        'notes_count' => $r[0],
        'downloads'=>$r[1],
		);
	
	}

 $jsonstring = json_encode($json);
echo $jsonstring;
	

?>