<?php
require_once('fn.php');
require_once('dbcon.php');

if (!isset($_SESSION['userId'])) {
    redirect('login.php');
    if(($_SESSION['userStatus'] == 0)){
        redirect('register.code.php');
    }
} else {

    $product_id = filter_var($_POST['product_id'], FILTER_VALIDATE_INT);
    $quantity = filter_var($_POST['quantity'], FILTER_VALIDATE_INT);
    $size = $_POST['productSize'];  
    $cartStatus = "OnCart";

    //echo $product_id,"<br>",$quantity,"<br>",$size,"<br>",$cartStatus;

    $check_sql = "SELECT * FROM cart WHERE p_id  = ? AND c_id = ?";
    $check_stmt = $mysqli->prepare($check_sql);
    $check_stmt->bind_param("ss", $product_id, $_SESSION['userId']);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_quantity = $quantity + $row['p_quantity'];

        $update_sql = "UPDATE cart SET p_quantity = ? WHERE p_id = ?";
        $update_stmt = $mysqli->prepare($update_sql);
        $update_stmt->bind_param("ii", $total_quantity, $product_id);

        $detail_update = "UPDATE order_detail SET d_quantity = ? WHERE p_id = ?";
        $detail_stmt = $mysqli->prepare($detail_update);
        $detail_stmt->bind_param("ii",$total_quantity,$product_id);

        if ($update_stmt->execute() and $detail_stmt->execute()) {
            JAlert('เพิ่มสินค้าลงตะกร้าเรียบร้อยแล้ว');
           goBack();
        }
    } else {
        if ($product_id !== false && $quantity !== false && $size !== false) {
            $insert_sql = "INSERT INTO cart (c_id, p_id, p_quantity, p_size) VALUES (?, ?, ?, ?)";
            $insert_stmt = $mysqli->prepare($insert_sql);
            $insert_stmt->bind_param('iiis', $_SESSION['userId'], $product_id, $quantity, $size);

            $detail_insert = "INSERT INTO order_detail (c_id, p_id, d_quantity, d_status, d_size) VALUES (?, ?, ?, ?, ?)";
            $detail_stmt = $mysqli->prepare($detail_insert);
            $detail_stmt->bind_param('iiiss',$_SESSION['userId'], $product_id, $quantity, $cartStatus, $size);

            if ($insert_stmt->execute() and $detail_stmt->execute()) {
                JAlert('เพิ่มลงตะกร้าเรียบร้อยแล้ว');
                goBack();
            } else {
                JAlert('Error: ' . $insert_stmt->error);
                goBack();
            }
        } else {
            echo $_SESSION['userId'], '<br>', $product_id, '<br>', $quantity;
        }
    }
}
?>
