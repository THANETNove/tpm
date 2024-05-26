<?php 
require_once('dbcon.php');
require_once('fn.php');

$id = $_GET["id"];

$delete_cart = "DELETE FROM cart WHERE p_id = $id";
$delete_detail = "DELETE FROM order_detail WHERE p_id = $id AND d_status = 'OnCart'";

$result = mysqli_query($mysqli, $delete_cart) or die ("Error in sql : sql". mysqli_error($mysqli));
$delete = mysqli_query($mysqli, $delete_detail) or die ("Error in sql : sql" . mysqli_errno($mysqli));

if ($result and $delete){
    JAlert("นำสินค้าออกจากตะกร้าเรียบร้อยแล้ว");
    goBack();
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();
?>