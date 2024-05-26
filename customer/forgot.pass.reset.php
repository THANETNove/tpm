<?php 
require_once("dbcon.php");
require_once("fn.php");

$encodeRan = isset($_GET['ref']) ? $_GET['ref'] : null;
$decodeRan = base64_decode($encodeRan);

$sql = "SELECT * FROM customer WHERE c_ref = ?";
$query = $mysqli->prepare($sql);
$query->bind_param("s",$decodeRan);
$query->execute();
$get = $query->get_result();
$list = $get->fetch_assoc();

if($get->num_rows > 0){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>T P M</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <style>
        body{
            background-color: #7DCEA0;
        }
        .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      .hidden{
        display: none;
      }
      .setRight{
        text-align: right;
      }
      .text-color{
        color: black;
      }
      .text-hide-underline{
        text-decoration: none;
      }
      }
    </style>
    <body>  
            <!-- Begin Page Content -->
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="text-center my-5">
                    <img src="https://icons.veryicon.com/png/o/miscellaneous/solid-icon/swarm-password-change.png" alt="logo" width="100">
                </div>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4">เปลี่ยนรหัสผ่าน</h1>
                        <form method="POST" class="needs-validation" autocomplete="off" action="forgot.pass.change.php">
                        <input type="hidden" class="form form-control hidden" id="passwordId" name="passwordId" value="<?php echo $row['c_id']?>">
                        <label class="mb-2 text-muted">อีเมล์ที่ลงทะเบียน</label>
                            <div class="input-group mb-3">
                                <input class="form-control" type="email" id="customerMail" name="customerMail" class="form-control" value="<?php echo $list['c_mail']; ?>" readonly>
                            </div>

                            <label class="mb-2 text-muted">รหัสผ่านใหม่</label>
                            <div class="input-group mb-3">
                                <input type="password" id="newPassword" name="newPassword" class="form-control" min="8" required>
                                <div class="">
                                <button type="button" class="btn btn-secondary mt-0" type="checkbox" onclick="showNewPass();">
                                <img src="https://icons.veryicon.com/png/o/business/classic-icon/eye-21.png" width="20px" height="auto">
                            </button>
                            </div>
                            </div>

                            <label class="mb-2 text-muted">ยืนยันรหัสผ่านใหม่อีกครั้ง</label>
                            <div class="input-group mb-3">
                                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" min="8" required>
                                <div class="">
                                <button type="button" class="btn btn-secondary mt-0" type="checkbox" onclick="showConPass();">
                                <img src="https://icons.veryicon.com/png/o/business/classic-icon/eye-21.png" width="20px" height="auto">
                            </button>
                            </div>
                            </div>

                            <div class="text-center align-items-center">
                                <a href="index.php" class="btn btn-secondary ms-auto" onclick="">ยกเลิก</a>
                            <span>
                                <button type="submit" class="btn btn-primary ms-auto">เปลี่ยนรหัสผ่าน</button>
                            </span>
                            </div>
                        </form>
                    </div>
                </div>
                    <!--Copyright &copy; 2017-2021 &mdash; Your Company--> 
                </div>
            </div>
        </div>
    </div>
        <!-- Footer-->
        <br>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="js/scripts.js"></script>
            <script>
        function showNewPass() {
            var x = document.getElementById("newPassword");
            if (x.type === "password") {
            x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function showConPass() {
            var x = document.getElementById("confirmPassword");
            if (x.type === "password") {
            x.type = "text";
            } else {
                x.type = "password";
            }
        }
            </script>
    </body>
</html>
<?php 
}else{
    redirect("index.php");
}
?>