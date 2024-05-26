<?php 
    require_once('dbcon.php');
    require_once('fn.php');

    $orderId = $_POST['orderId'];
    $reason = $_POST['causeText'];
    $note = $_POST['textNote'];
    $status = "อยู่ระหว่างดำเนินการขอคืนเงิน";
    $orderDate = $_POST['detailDate'];
    $refundDate = date("Y-m-d H:i:s");
    $refundCode = "1";

    echo $orderId,$reason,$note;
    
    // Assuming you have an array of uploaded files
    $images = array();
    foreach ($_FILES['imgsProve']['tmp_name'] as $key => $tmp_name) {
        $filename = $_FILES['imgsProve']['name'][$key];
        $imageData = file_get_contents($_FILES['imgsProve']['tmp_name'][$key]);
        $base64 = base64_encode($imageData);
        $images[] = array('filename' => $filename, 'data' => $base64);
    }
    $jsonImages = json_encode($images);

    // Insert the JSON data into the database
    // Insert the JSON data and other input values into the database
    $insertQuery = "INSERT INTO refund (r_status, r_cause, r_note, o_id, o_date, r_date, r_img, r_code ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $statement = $mysqli->prepare($insertQuery);
    $statement->bind_param("ssssssss", $status, $reason, $note, $orderId, $orderDate, $refundDate, $jsonImages, $refundCode);
    $result = $statement->execute();

    $updateDetail = "UPDATE order_detail SET d_status = 'Refund' WHERE d_status = 'Ordered' AND  o_date = '".$orderDate."' AND c_id = '".$_SESSION['userId']."'";
    $updateOrder = "UPDATE orders SET r_code = '".$refundCode."' WHERE o_date  = '".$orderDate."' AND c_id = '".$_SESSION['userId']."'";
    if ($result === TRUE and $mysqli->query($updateDetail) === TRUE and $mysqli->query($updateOrder) === TRUE) {
        JAlert("ส่งเรื่องสำหรับการขอคืนสินค้าแล้ว");
        redirect("purchase.history.php");
    }else{
        JAlert("ไม่สามารถส่งแบบฟอร์มได้");
        redirect("refund.php");
    }



?>
