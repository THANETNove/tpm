<?php 
require_once("dbcon.php");
require_once("fn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['codeCheck'];
    $change = 1;

    $sql = "SELECT * FROM customer WHERE c_ref = ?";
    $query_stmt = $mysqli->prepare($sql);
    $query_stmt->bind_param("s", $code);
    $query_stmt->execute();
    $result = $query_stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
            $update_sql = "UPDATE customer SET c_check = ? WHERE c_ref = ?";
            $update_stmt = $mysqli->prepare($update_sql);
            $update_stmt->bind_param("ss", $change, $code);
            if ($update_stmt->execute()) {
                $_SESSION['userId'] = $row['c_id'];
                $_SESSION['username'] = $row['c_name'];
                $_SESSION['userStatus'] = $change;
                $_SESSION['userMail'] = $row['c_mail'];
                JAlert("รหัสยืนยันถูกต้อง การยืนยันเสร็จสิ้น");
                echo $_SESSION['userId'],"<br>",$_SESSION['username'],"<br>",$_SESSION['userStatus'],"<br>";
                redirect("user.edit.php");
            }
            }else{
                JAlert("รหัสยืนยันไม่ถูกต้อง");
                goBack();
            }
        }
?>
