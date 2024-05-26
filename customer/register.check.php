
<?php

require_once('dbcon.php');
require_once('fn.php');
require_once('PHPMailer/src/PHPMailer.php');
require_once('PHPMailer/src/SMTP.php');
require_once('PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;

// Retrieve form data
$email = $_POST["Email"];
$password = $_POST["password"]; 
$hashPasswords = password_hash($password,PASSWORD_DEFAULT);
$confirmPassword = $_POST["confirmPassword"];
$status = "ยังไม่ยืนยัน";
$ref= rand(999999, 111111);
$available = "No";
$TPM = "Thai Technic Plas-Mach Co., Ltd.";

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->CharSet = "UTF-8";
$mail->SMTPAuth = true;
$mail->Username = "646051800449@mail.rmutk.ac.th";// Email Sender
$mail->Password = "papa2606";
$mail->Port = 587;
$mail->SMTPSecure = "tls";

$mail->isHTML(true);
$mail->setFrom($email, $TPM);
$mail->addAddress($email); // Email recive
$mail->Subject = "ยินดีต้อนรับสู่การใช้งานเว็บไซต์ TPM";
$mail->Body = "รหัสการอ้างอิงการสมัครสมาชิกคือ: ".$ref." ";

if($confirmPassword != $password){
    JAlert("ช่องยืนยันรหัสผ่านกับรหัสผ่านไม่ตรงกัน กรุณากรอกใหม่อีกครั้ง");
    goBack();
}else{
// Check if the username or email already exists in the database
$check_sql = "SELECT * FROM customer WHERE c_mail = ?";
$check_stmt = $mysqli->prepare($check_sql);
$check_stmt->bind_param("s", $email);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows > 0) {
    // User already exists
    JAlert("อีเมล์นี้ได้ลงทะเบียนไว้แล้ว");
    goBack();
} else {

$ins_sql = "INSERT INTO customer (c_mail, c_pass,c_ref,c_check) VALUES ('$email', '$hashPasswords','$ref','$available')";
$ins_stmt = mysqli_query($mysqli,$ins_sql);
if ($ins_stmt) {
        JAlert("สมัครสมาชิกสำเร็จ");
        $mail->send();

        $sql = "SELECT * FROM customer WHERE c_mail = '".$email."'";
        $query = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_assoc($query);

        $_SESSION['userId'] = $row['c_id'];
        $_SESSION['username'] = $row['c_name'];
        $_SESSION['userStatus'] = $row['c_check'];
        redirect('register.code.php');
        exit();
    }else{
  echo "Error: " . $mysqli->error;
    }
}

// Close the database connection
$check_stmt->close();
$ins_stmt->close();
$mysqli->close();
}
?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script type="text/javascript">

</script>