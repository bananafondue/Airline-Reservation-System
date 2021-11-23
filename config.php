<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Try connecting to the Database
$conn = mysqli_connect($server, $username, $password, $dbname);

//Check the connection
if($conn == false){
    echo "<script>alert('Connection Failed.')</script>";
}

?>
