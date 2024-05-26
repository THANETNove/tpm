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
        
        <!-- Navigation-->
        <?php 
        include('nav.inc.php');

    $sql = "SELECT * FROM customer WHERE c_id = '".$_SESSION['userId']."'";
    $query = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_assoc($query);
?>
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
                        <form method="POST" class="needs-validation" autocomplete="off" action="pass.change.proc.php">
                        <input type="hidden" class="form form-control hidden" id="passwordId" name="passwordId" value="<?php echo $row['c_id']?>">
                        <label class="mb-2 text-muted">รหัสผ่านเก่า</label>
                            <div class="input-group mb-3">
                                <input type="password" id="oldPassword" name="oldPassword" class="form-control" min="8" required>
                                <div class="">
                                <button type="button" class="btn btn-secondary mt-0 fa-solid" type="checkbox" onclick="showOldPass();">
                                <img src="https://icons.veryicon.com/png/o/business/classic-icon/eye-21.png" width="20px" height="auto">
                            </button>
                            </div>
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
                                <a href="index.php" class="btn btn-secondary ms-auto" onclick="">ย้อนกลับ</a>
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
        <footer class="py-5 bg-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-1"></div>
                    <div class="col-5">
                        <h3 class="m-0 text-center text-white"><strong>ติดต่อเรา</strong></h3><br>
                        <p class="m-0 text-start text-white">บริษัท  ไทยเทคนิค  พลาส  - แมช  จำกัด <br> 814, 814/1  ถนนเอกชัย  แขวงบางบอนเหนือ <br>เขตบางบอน  กรุงเทพ 10150.</p>    
                        <p class="m-0 text-start text-white">โทรศัพท์ : 02-415-1666  <br>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;02-415-0048 <br>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;02-899-6754-8 <br>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;089-793-4307</p>
                        <p class="m-0 text-start text-white">โทรสาร : &nbsp;&nbsp;02-416-4706</p>
                        <p class="m-0 text-start text-white">E-mail : &nbsp;&nbsp;&nbsp;tpmcoth@yahoo.com</p>
                        <p class="m-0 text-start text-white">Line ID : &nbsp;&nbsp;tpmcoth</p>
                    </div>
                    <div class="col-5">
                        <h3><p class="m-0 text-center text-white"><b>เวลาเปิดทำการ</b></p></h3><br>
                        <p class="m-0 text-start text-white">วันจันทร์ - วันเสาร์  เวลา 08:00-17:00 น</p>
                        <p class="m-0 text-start text-white">วันอาทิตย์  หยุดทำการ</p>
                        <br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3260.098805991059!2d100.40192024306499!3d13.66185642249991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2bd0fa6cec8c7%3A0x18b8d4facd8b0217!2z4Lia4Lij4Li04Lip4Lix4LiXIOC5hOC4l-C4ouC5gOC4l-C4hOC4meC4tOC4hOC4nuC4peC4suC4qi3guYHguKHguIog4LiI4Liz4LiB4Lix4LiU!5e0!3m2!1sen!2sth!4v1702542080831!5m2!1sen!2sth" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    <div class="col-1"></div>
                </div>
                </div>
            </footer>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="js/scripts.js"></script>
            <script>
                 function showOldPass() {
            var x = document.getElementById("oldPassword");
            if (x.type === "password") {
            x.type = "text";
            } else {
                x.type = "password";
            }
        }
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
