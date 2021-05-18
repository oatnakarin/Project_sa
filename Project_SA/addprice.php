<?php
    include("server.php");
    session_start();
    if(isset($_POST['submit'])){
        $_SESSION['num'] = $_POST['price'];
        if($_SESSION['num']<1){
            echo "<script type='text/javascript'>";
            echo "alert('กรุณาใส่เลขมากกว่า 0');";
            echo "window.location = 'index.php'; ";
			echo "</script>";
        }
    }
    $name = $_SESSION['tempn'];
    $query = "SELECT * FROM detailprice WHERE name = '$name' " or die("Error:" . mysqli_error()); 
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $number  = $row['number'] + $_POST['price'];
    $query2 = "UPDATE detailprice SET number = '$number' WHERE name = '$name'";
    $result2 = mysqli_query($conn, $query2);
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มจำนวนสินค้าเรียบร้อยแล้ว!');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
?>