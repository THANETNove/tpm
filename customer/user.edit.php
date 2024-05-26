<?php
require_once('fn.php');
require_once('dbcon.php');

if (!isset($_SESSION['userId'])) {
    redirect('login.php');
    if(($_SESSION['userStatus'] == 0)){
        redirect('register.code.php');
    }
} else {
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
        .custom-thead {
            background-color: black; /* Change the background color to black */
            color: white; /* Change the text color to white for better visibility */
        }
        .container {
            max-width: 1250px;
        }
        .card {
            border: 2px solid #000000;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #3498DB;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border: 2px solid #3498DB;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #28B463;
            border: none;
        }

        .btn-primary:hover {
            background-color: #000000;
        }

        .btn-secondary {
            background-color: #C0392B;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #000000;
        }
        .hidden-row{
            display: none;
        }
    </style>
     <script>
        function goBack() {
            // Use the browser's history object to navigate back
            window.history.back();
        }
        </script>
    <body>
        <!-- Navigation-->
        <?php 
        
        include('nav.inc.php');
        

        $query = "SELECT * FROM customer WHERE c_id = '".$_SESSION['userId']."'";
        $result = mysqli_query($mysqli, $query) or die ("Error in sql : $query". mysqli_error($condb));
        $row = mysqli_fetch_array($result);

        ?>
        <!-- Header-->
        <header class="bg-dark py-5" src="img\bg2.jpg">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">T P M</h1>
                    <p class="lead fw-normal text-white-50 mb-0">ผู้ผลิตและจำหน่ายบรรจุภัณฑ์ถุงพลาสติกและกระดาษเคลือบห่ออาหาร ที่คุณภาพดีสะอาด ปลอดภัย 100%</p>
                </div>
            </div>
        </header>
<body>

<section id="about" class="about-mf sect-pt4 route">
        <div class="container rounded bg-white mt-5 mb-5">
<div class="container">
    <div class="mt-3 mb-3 bg-white p-3 py-2 rounded">
  <h1>ข้อมูลส่วนตัว</h1>
  <form action="user.edit.proc.php" method="post" enctype="multipart/form-data">
    <input type="hidden" class="form-control" id="customerID" name="customerID" value="<?php echo $row['c_id'];?>">
    <div class="mb-3 text-center">
        <img src="uploads/customer_img/<?php echo $row['c_img']; ?>" width="300" class="rounded-circle border border-2 border-dark" id="preview">
    </div>
    <div class="mb-3 text-center">
        <input type="file" class="form form-control" id="customerImg" name="customerImg" accept="image/*" onchange="previewImage()">
    </div>
    <div class="mb-3">
      <label for="customerName" class="form-label">ชื่อ - สกุล</label>
      <input type="text" class="form-control" id="customerName" name="customerName" value="<?php echo $row['c_name'];?>">
    </div>
    <div class="row">
    <div class="col-6 mb-3">
      <label for="customerGender" class="form-label">เพศ</label>
      <input type="text" class="form-control" id="customerGender" name="customerGender" value="<?php echo $row['c_gender'];?>">
    </div>
    <div class="col-6 mb-3">
      <label for="customerAge" class="form-label">อายุ</label>
      <input type="text" class="form-control" id="customerAge" name="customerAge" value="<?php echo $row['c_age'];?>">
    </div>
    <div class="mb-3">
      <label for="customerTel" class="form-label">เบอร์โทรศัพท์</label>
      <input type="text" class="form-control" id="customerTel" name="customerTel" value="<?php echo $row['c_tel'];?>">
    </div>
    <div class="mb-3">
      <label for="customerAddress1" class="form-label">ที่อยู่ลำดับที่ 1</label>
      <input type="text" class="form-control" id="customerAddress1" name="customerAddress1" value="<?php echo $row['c_addr1'];?>">
    </div>
    <div class="mb-3">
      <label for="customerAddress2" class="form-label">ที่อยู่ลำดับที่ 2</label>
      <input type="text" class="form-control" id="customerAddress2" name="customerAddress2" value="<?php echo $row['c_addr2'];?>">
    </div>
    <div class="mb-3">
      <label for="customerAddress3" class="form-label">ที่อยู่ลำดับที่ 3</label>
      <input type="text" class="form-control" id="customerAddress3" name="customerAddress3" value="<?php echo $row['c_addr3'];?>">
    </div>
    <div class="text-center mb-3">
        <a href="user_info.php" class="btn btn-danger">ย้อนกลับไปหน้าที่แล้ว</a>
        <button type="submit" class="btn btn-primary">บันทึกข้อมูลการเปลี่ยนแปลง</button>
    </div>
    </form>
</div>
</div>
        </div>
</section>

                <!--Footer-->
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

            <script>function previewImage() {
            var input = document.getElementById('customerImg');
            var preview = document.getElementById('preview');

            var file = input.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            }
        }
        </script>
    </body>
</html>
<?php 
}
?>