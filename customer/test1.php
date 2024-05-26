<?php
require_once('dbcon.php');

$time = "2024-02-16 17:28:11";
$status = "Ordered";

// Fetch products from the database
$sql = "SELECT * FROM order_detail JOIN product ON order_detail.p_id = product.p_id WHERE order_detail.c_id = ? AND order_detail.d_status = ? AND order_detail.o_date = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('sss', $_SESSION['userId'], $status, $time);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    print_r($row);
    }
?>
