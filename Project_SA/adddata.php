<?php
session_start();
include("server.php");
if(isset($_POST['but_up'])){
	$n  = $_SESSION['name'];
    $queryyy = "SELECT * FROM userr  WHERE name = '$n'";
	$resultt = mysqli_query($conn, $queryyy);
	$rowx = mysqli_fetch_array($resultt);
	$name =  $rowx['name'];
	$address  = $rowx['address'];
	$nameprice = "";
	$price = "";
	$number = "";
	$total = $_SESSION['total'];
	$queryy3 = "SELECT * FROM tempdata";
	$result3 = mysqli_query($conn, $queryy3);

  $nameq = $_FILES['file']['name'];
  $target_dir = "upload/";
  if($nameq != ''){
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
			while ($rowz = mysqli_fetch_array($result3)){
				$nameprice = $rowz['nameprice'];
				$price = $rowz['price'];
				$number = $rowz['number'];
				$queryl = "SELECT * FROM detailprice  WHERE nameprice = '$nameprice' ";
            	$result0 = mysqli_query($conn, $queryl);
            	$rowpp = mysqli_fetch_array($result0);
				$tempnumber = $rowpp['number'] - $number;
				$sqlm = "UPDATE detailprice SET number='$tempnumber' WHERE nameprice='$nameprice' ";
				mysqli_query($conn, $sqlm);
				$sqlr = "INSERT INTO datauser (name,image,address,nameuser,nameprice,price,total,number) 
				VALUES ('$nameq','$image','$address','$name','$nameprice','$price','$total','$number')";
				mysqli_query($conn, $sqlr);
				move_uploaded_file($nameq,$target_dir.$name);
			}
			$xxr = "DELETE FROM tempdata";
        	$conn->query($xxr);
			echo "<script type='text/javascript'>";
			echo "alert('อัพหลักฐานการส่งสำเร็จ!');";
			echo "window.location = 'tracking.php'; ";
			echo "</script>";
  	}
  }
}
?>