<?PHP  
// CHECK USERNAME OR PASSWORD FROM DATABASE
include 'db.php';	
$json = array();
session_start();
$email=$_SESSION["email"];
$qry="select sub_name,hash from sub_names where email='$email'";
$row=mysql_query($qry,$conn);
while($r=mysql_fetch_array($row))
{
	$json []= array(
        'sub_name' => $r[0],
        'hash' => $r[1],

    );
	
}

$jsonstring = json_encode($json);
echo $jsonstring;
?>