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
        }else{
            header("location: cart.php");
        }
    }
?>