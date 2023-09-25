<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tpm";

$mysqli = new mysqli($servername,$username,$password,$dbname); 

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}else{
    echo "Connected database";
}
?>