<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tpm";

session_start();

$mysqli = new mysqli($servername,$username,$password,$dbname); 
date_default_timezone_set('Asia/Bangkok');
mysqli_set_charset($mysqli,"utf8mb4");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}else{
    
}

?>