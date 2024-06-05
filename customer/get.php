<?php
require_once('dbcon.php');

$sql = "SELECT * FROM customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode(['message' => 'เชื่อมต่อฐานข้อมูลสำเร็จ', 'data' => $data]);
} else {
    echo json_encode(['message' => '0 ผลลัพธ์']);
} 
?>