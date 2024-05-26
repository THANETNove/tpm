<?php

    require_once('dbcon.php');
    require_once('fn.php');

    // Check if the form has been submitted
    /*if($_SERVER["REQUEST_METHOD"] == "POST")*/
    // Define your authentication logic here (e.g., check against a database)

    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];

    $sql = "SELECT * FROM customer WHERE c_mail = '$inputEmail'"; 
    $result = mysqli_query($mysqli,$sql);
    if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_array($result);
    $store_password = $row['c_pass'];
    $validPassword = password_verify($inputPassword,$store_password);

    $_SESSION['userId'] = $row['c_id'];
    $_SESSION['username'] = $row['c_name'];
    $_SESSION['userStatus'] = $row['c_check'];
    $_SESSION['userMail'] = $row['c_mail'];
    if($validPassword){
        $queryMem = "SELECT * FROM customer WHERE c_mail = '$inputEmail'";
        $resultMem = mysqli_query($mysqli,$queryMem);
        $rowM = mysqli_fetch_array($resultMem);

    if ($row){


        echo $row['c_id'];
        $timestamp = "INSERT INTO login_log (c_id) VALUE ('$row[c_id]') ";
        $mysqli->query($timestamp);

        if(!empty($_POST['rememberMe'])){
            setcookie('user_login',$_POST['email'], time()+(10*365*24*60*60));
            setcookie('user_password',$_POST['password'], time()+(10*365*24*60*60));
            echo $row['c_mail'];
        }else{
            if (isset($_COOKIE['user_login'])){
                setcookie('user_login','');
                if(isset($_COOKIE['uesr_password'])){
                    setcookie('uesr_password','');
                }
            }
        }
        JAlert("เข้าสู่ระบบสำเร็จ");
        echo "เข้าสู่ระบบสำเร็จ";
        echo $_SESSION['userStatus'];
        redirect("index.php");
        }
    }else{
        JAlert("อีเมล์ผู้ใช้งานหรือรหัสผ่านผิดพลาด กรุณากรอกใหม่อีกครั้ง");
        goBack();
    }
    }
?>