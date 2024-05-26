<?php
require_once('dbcon.php');
require_once('fn.php');
// Retrieve form data
$id = $_POST['passwordId'];
$old_p = $_POST["oldPassword"];
$new_p = $_POST["newPassword"]; 
$confirmPassword = $_POST["confirmPassword"];
$hashPassword = password_hash($new_p,PASSWORD_DEFAULT);


if($confirmPassword === $new_p){
    $check_sql = "SELECT * FROM customer WHERE c_id = '".$id."'";
    $check_stmt = $mysqli->query($check_sql);
    $countuser = $check_stmt->num_rows;
    $userdata = $check_stmt->fetch_assoc();
    if($old_p = $userdata['c_pass']){
        $sql = "UPDATE customer SET c_pass = '$hashPassword' WHERE c_id = '".$id."'";
        if($mysqli->query($sql) === TRUE){
            JAlert("รหัสผ่านถูกเปลี่ยนเรียบร้อยแล้ว");
            redirect("index.php");
        }else{
            echo "Error :".$sql.mysqli_error($mysqli);
        }
    }else{
        JAlert("รหัสผ่านเก่าไม่ถูกต้อง");
        goBack();
    }
    $mysqli->close();
}else{
        JAlert("รหัสผ่านใหม่กับช่องยืนยันรหัสผ่านไม่ตรงกัน");
    goBack();
}
?>