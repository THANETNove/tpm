<?php 
    require_once('dbcon.php');
    require_once('fn.php');

    // Check if the form has been submitted
    /*if($_SERVER["REQUEST_METHOD"] == "POST")*/
    // Define your authentication logic here (e.g., check against a database)

    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    $SQL = 'SELECT * FROM employee WHERE e_user ="'.$inputUsername.'" AND e_pass = "'.md5($inputPassword).'" ';
    $result=$mysqli->query($SQL);
    $countuser = $result->num_rows;
    $userdata=$result->fetch_assoc();
    if($countuser==1)
    {
        print "Welcome ".$userdata['c_name'];
        print 'meta http-equiv="refresh" content="2;url=index.php>';
        JAlert("เข้าสู่ระบบสำเร็จ");
        $_SESSION['login_name'] = $userdata['c_name'];
        $_SESSION['login_user'] = $userdata['c_user'];
        redirect('index.php');
    }else
    {
        JAlert("กรุณาตรวจสอบเบอร์โทรศัพท์มือถืออีกและรหัสผ่านอีกครั้ง");
        redirect('login.php');
    }

?>