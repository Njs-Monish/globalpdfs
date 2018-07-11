<?PHP  
// CHECK USERNAME OR PASSWORD FROM DATABASE
include 'db.php';
$POSTDATA = FILE_GET_CONTENTS("PHP://INPUT");
$REQUEST = JSON_DECODE($POSTDATA);
$hash=$_REQUEST["hash"];
$notes_name = $_REQUEST["notes_name"];

  $notes_link = $_REQUEST["notes_name"]."_".$hash;

	 $file_name = $_FILES['notes']['name'];
	
		$file_tmp =$_FILES['notes']['tmp_name'];
		$file_type=$_FILES['notes']['type'];   
		$file_ext=strtolower(end(explode('.',$_FILES['notes']['name'])));
		
		$expensions= array("pdf","doc","ppt","pptx","xls","xml"); 		
		if(in_array($file_ext,$expensions)=== false){
			echo "-1";
		}
		else{
		if(empty($errors)==true){
			 $qry="insert into notes (notes_name,hash,notes_link,extension) values ('$notes_name','$hash','$notes_link','$file_ext')";
       $row=mysql_query($qry,$conn);

			move_uploaded_file($file_tmp,"notes/".$notes_name."_".$hash.".".$file_ext);
			echo "1";
		}else{
			echo "0";
			}
		}
?>