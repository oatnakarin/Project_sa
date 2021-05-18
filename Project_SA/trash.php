<?php 
    session_start();
    include('server.php');
    $id = $_REQUEST['row'];
    echo "id: ".$id;
    $sql = "DELETE FROM tempdata WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        $_SESSION['check'] == "true";
      } else {
        $_SESSION['check'] == "false";
      }
      header("location:cart.php")
?>