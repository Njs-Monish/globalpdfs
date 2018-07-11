<?php
	include 'db.php';
    $key=$_GET['key'];
    $array = array();
	//$conn = mysql_connect("localhost","root","") or die("connection failed start");
	//mysql_select_db("global_pdfs",$conn) or die("db not selected...");

    $row=mysql_query("select * from sub_names where sub_name LIKE '%{$key}%'",$conn);
    while($r=mysql_fetch_array($row))
    {
      $array[] = $r[1];
	
    }
    echo json_encode($array);
?>
