<?php
include("server.php");
if(isset($_POST['but_upload'])){
  $nameprice = $_POST['nameprice'];
  $price  = $_POST['price'];
  $number =  $_POST['number'];
  $detail =  $_POST['detail'];
  $name = $_FILES['file']['name'];
  $target_dir = "upload/";
  if($name != ''){
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	// Select file type
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	 // Valid file extensions
	 $extensions_arr = array("jpg","jpeg","png","gif");
	 // Check extension
	 if( in_array($imageFileType,$extensions_arr) ){
		 // Convert to base64 
		 $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
		 $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
			// Insert record
			$query = "INSERT INTO detailprice(name,image,nameprice,detail,price,number)
			VALUES ('$name','$image','$nameprice','$detail','$price','$number')";
			mysqli_query($conn,$query); 
			move_uploaded_file($name,$target_dir.$name);
		if(isset($query)){
			echo "<script type='text/javascript'>";
			echo "alert('Upload File Succesfuly');";
			echo "window.location = 'index.php'; ";
			echo "</script>";
			}
			else{
			echo "<script type='text/javascript'>";
			echo "alert('Error back to upload again');";
			echo "window.location = 'addstock.php'; ";
			echo "</script>";
		}
  	}
  }
}
?>