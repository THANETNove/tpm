<?php 

require_once("dbcon.php");
require_once("fn.php");

$productType = $_POST['productType'];
$productSize = $_POST['productSize'];
$screenImg = $_POST['screenImg'];
$amountBag = $_POST['amountBag'];
$totalPrice = $_POST['totalPrice'];
$addText = $_POST['addText'];
$customerName = $_POST['customerName'];
$customerTel = $_POST['customerTel'];
$customerEmail = $_POST['customerMail'];
$customerAddr = $_POST['address'];
$customerPay = $_POST['qrImg'];
$status = "อยู่ระหว่างตรวจสอบหลักฐานการชำระเงิน";
$date = date("Y-m-d H:i:s");
$ref = rand(100000000000001,999999999999999);
$orderType = "การพิมพ์ลายถุง";

echo $productType,"<br>",$productSize,"<br>",$screenImg,"<br>",$amountBag,"<br>",$addText,"<br>",$totalPrice;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Update image details into the database
                $sql = "INSERT INTO orders (o_date,o_status,o_price,o_img,o_address,c_mail,c_name,o_ref,c_id,o_type) 
                VALUES ('$date','$status','$totalPrice','$customerPay','$customerAddr','$customerEmail','$customerName','$ref','".$_SESSION['userId']."','$orderType')";
                if ($mysqli->query($sql) === TRUE) {
                    $screen = "INSERT INTO screenbag (s_type,s_file,s_amount,s_text,s_date,c_id,s_size) 
                    VALUES ('$productType','$screenImg','$amountBag','$addText','$date','".$_SESSION['userId']."','$productSize')";
                    $bag  = $mysqli->query($screen);
                    JAlert("บันทึกข้อมูลสำเร็จแล้ว");
                    //header("Location:purchase.history.php");
                } else {
                    JAlert("ไม่สามารถบันทึกข้อมูลได้ " . $sql . "<br>" . $mysqli->error);

                }
                $condb->close();
        } else {
        echo "ข้อมูลไม่ได้ถูกส่งจากแบบฟอร์ม";
    }
?>