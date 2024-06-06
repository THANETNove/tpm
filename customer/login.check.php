<?php
require_once('dbcon.php');
require_once('fn.php');

// เริ่มต้นเซสชัน
session_start();

// ตรวจสอบว่าฟอร์มถูกส่งมาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม
    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];

    // ตรวจสอบว่าชื่อผู้ใช้และรหัสผ่านไม่ว่างเปล่า
    if (empty($inputEmail) || empty($inputPassword)) {
        JAlert("โปรดกรอกข้อมูลให้ครบถ้วน");
        goBack();
        exit();
    }

    // ใช้ prepared statements เพื่อป้องกัน SQL injection
    $sql = "SELECT * FROM customer WHERE c_mail = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $inputEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $store_password = $row['c_pass'];
        $validPassword = password_verify($inputPassword, $store_password);

        if ($validPassword) {
            // ตั้งค่าเซสชัน
            $_SESSION['userId'] = $row['c_id'];
            $_SESSION['username'] = $row['c_name'];
            $_SESSION['userStatus'] = $row['c_check'];
            $_SESSION['userMail'] = $row['c_mail'];

            // บันทึกเวลาการเข้าสู่ระบบ
            $timestampSql = 'INSERT INTO login_log (c_id) VALUES (?)';
            $logStmt = $mysqli->prepare($timestampSql);
            $logStmt->bind_param('i', $row['c_id']);
            if ($logStmt->execute()) {
                // แจ้งเตือนและเปลี่ยนเส้นทาง
                JAlert("เข้าสู่ระบบสำเร็จ");
                redirect("index.php");
            } else {
                // แสดงข้อผิดพลาดหาก INSERT ไม่สำเร็จ
                JAlert("เกิดข้อผิดพลาดในการบันทึกเวลาการเข้าสู่ระบบ: " . $logStmt->error);
                goBack();
            }
        } else {
            JAlert("อีเมล์ผู้ใช้งานหรือรหัสผ่านผิดพลาด กรุณากรอกใหม่อีกครั้ง");
            goBack();
        }
    } else {
        JAlert("อีเมล์ผู้ใช้งานหรือรหัสผ่านผิดพลาด กรุณากรอกใหม่อีกครั้ง");
        goBack();
    }

    // ปิด statement และ connection
    $stmt->close();
    $mysqli->close();
}
?>