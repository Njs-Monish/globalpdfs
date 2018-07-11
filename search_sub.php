<?PHP  
// CHECK USERNAME OR PASSWORD FROM DATABASE
include 'db.php';	
$json = array();
$POSTDATA = FILE_GET_CONTENTS("PHP://INPUT");
$REQUEST = JSON_DECODE($POSTDATA);
$search= $REQUEST->search;
 $qry="select b.notes_name,b.notes_link,b.extension,c.name,c.designation,c.instuition,b.downloads from notes b, admins c where b.hash =(select hash from sub_names where sub_name like '%$search%') and c.email=(select email from sub_names where sub_name like '%$search%')";
$row=mysql_query($qry,$conn);
while($r=mysql_fetch_array($row))
{
	$json []= array(
        'sub_name' => $r[0],
        'link'=>$r[1],
        'extension'=>$r[2],
        'name'=> $r[3],
        'designation' => $r[4],
        'instuition' => $r[5],
        'downloads' => $r[6],

    );
	
}

$jsonstring = json_encode($json);
echo $jsonstring;
?>