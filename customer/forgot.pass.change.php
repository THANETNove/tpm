<?php 
require_once("dbcon.php");
require_once("fn.php");

$new_p = $_POST["newPassword"];
$con_p = $_POST["confirmPassword"];
$email = $_POST["customerMail"];
$null = "null";


echo $new_p,"<br>",$con_p,"<br>",$email;

if($_SERVER["REQUSET_METHOD"] = "POST"){
    if($new_p == $con_p){
        $hash_pass = password_hash($con_p,PASSWORD_DEFAULT);
        $sql = "UPDATE customer SET c_pass = ?,c_ref = ? WHERE c_mail = ?";
        $query = $mysqli->prepare($sql);
        $query->bind_param("sss",$hash_pass,$null,$email);
        if($query->execute()){
        JAlert("แก้ไขรหัสผ่านใหม่เรียบร้อยแล้ว");
        redirect("login.php");
        }else{
            JAlert("อีเมล์ไม่ตรงกันที่ลงทะเบียนไว้");
            goBack();
        }
    }else{
        JAlert("รหัสผ่านใหม่กับยืนยันรหัสผ่านไม่ตรงกัน");
        goBack();
    }
}
?>