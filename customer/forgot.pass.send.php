<?php
require_once('dbcon.php');
require_once('fn.php');
require_once('PHPMailer/src/PHPMailer.php');
require_once('PHPMailer/src/Exception.php');
require_once('PHPMailer/src/SMTP.php');

$email = $_POST['email'];
$numRan = random_int(111111,999999);
$encodeRan = base64_encode($numRan);
$TPM = "Thai Technic Plas-Mach Co., Ltd.";
$decodeRan =base64_decode($encodeRan);

echo $numRan,"<br>",$encodeRan,"<br>",$email,"<br>",$decodeRan;

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

$check = "SELECT * FROM customer WHERE c_mail = ?";
$get = $mysqli->prepare($check);
$get->bind_param("s",$email);
$get->execute();
$list = $get->get_result();

$mail->isHTML(true);
$mail->setFrom($email,$TPM);
$mail->addAddress($email);
$mail->Subject = "ยืนยันการเปลี่ยนรหัสผ่าน";
$mail->Body = "ข้อความนี้มาจากการที่ผู้ใช้งานได้กดลืมรหัสผ่านไว้ หากมิได้ทำการกดลืมรหัสผ่าน ไม่จำเป็นต้องกด URL ที่แนบไว้ และกรุณาเปลี่ยนรหัสผ่าน<br><br>
                URL สำหรับเปลี่ยนรหัสผ่าน <a href='127.0.0.1/tpm/customer/forgot.pass.reset.php?ref=$encodeRan'>กดที่นี้</a>";
if($list->num_rows == 1){
$sql = "UPDATE customer SET c_ref = ? WHERE c_mail = ?";
$query = $mysqli->prepare($sql);
$query->bind_param("ss",$numRan,$email);
if($query->execute()){
    JAlert("ส่ง URL สำหรับการแก้ไขรหัสผ่านทางอีเมล์ที่ลงทะเบียนเรียบร้อยแล้ว");
    $mail->send();
    goBack();
}else{
    echo "Error : ".$query." ";
}
}else{
    JAlert("ไม่มีอีเมล์นี้ในการลงทะเบียน");
    goBack();
}
$mysqli->close();
?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script type="text/javascript">