<?PHP  
// CHECK USERNAME OR PASSWORD FROM DATABASE
include 'db.php';	
$json = array();
session_start();
$email=$_SESSION["email"];
$qry="select email,name,password,designation,instuition from admins where email='$email'";
$row=mysql_query($qry,$conn);
while($r=mysql_fetch_array($row))
{
	$json []= array(
        'email' => $r[0],
        'name' => $r[1],
        'password' => $r[2],
        'designation' => $r[3],
        'instuition' => $r[4],

    );
	
}

$jsonstring = json_encode($json);
echo $jsonstring;
?>