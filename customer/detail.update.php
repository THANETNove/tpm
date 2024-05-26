<?php 
require_once("dbcon.php");
require_once("fn.php");
require_once("PHPMailer/src/PHPMailer.php");
require_once("PHPMailer/src/SMTP.php");
require_once("PHPMailer/src/Exception.php");

$date = $_POST['date'];
$time = date("Y-m-d H:i:s");
$status = "ได้รับสินค้าแล้ว";

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->CharSet = "UTF-8";
$mail->SMTPAuth = true;
$mail->Username = "646051800449@mail.rmutk.ac.th";
$mail->Password = "papa2606";
$mail->Port = 587;
$mail->SMTPSecure = "tls";
$TPM = "Thai Technic Plas-Mach Co., Ltd.";

$sel = "SELECT * FROM orders INNER JOIN order_detail ON orders.o_date = order_detail.o_date WHERE orders.o_date = ?";
$exc_stmt = $mysqli->prepare($sel);
$exc_stmt->bind_param("s",$date);
$exc_stmt->execute();
$get_stmt = $exc_stmt->get_result();
$list = $get_stmt->fetch_assoc();

$orderRef = $list['o_ref'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $confirmation = $_POST["confirmation"];

    if ($confirmation === "yes") {
        $sql = "UPDATE orders SET o_received  = ?, o_status = ? WHERE o_date = ?";
        $query = $mysqli->prepare($sql);
        $query->bind_param("sss", $time, $status, $date);
        if ($query->execute()) {
            JAlert("ยืนยันการรับสินค้าเรียบร้อยแล้ว");
            redirect("purchase.history.php");
        } else {
            JAlert("ไม่สามารถยืนยันการรับสินค้าได้");
            goBack();
        }
    } else {
        JAlert("ไม่ผ่านการยืนยัน");
        goBack();
    }
}
?>
