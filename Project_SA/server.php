<?php 

    $servername = "localhost";
    $username = "projectbag_root";
    $password = "Oat29062";
    $dbname = "projectbag_registerdb";

    // Create Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } 
?>