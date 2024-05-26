<?php 
    require_once('fn.php');
    require_once('dbcon.php');

    if(isset($_SESSION["userId"]) && ($_SESSION["userStatus"] == 0)){
            redirect("register.code.php");
    }else{
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
    </style>
    <body>
    <?php 
            require_once("nav.inc.php");

            $sql = "SELECT * FROM news";
            $result = mysqli_query($mysqli,$sql) or die ("Error in sql : $sql".mysqli_error($mysqli));
            $row = mysqli_fetch_array($result)
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
        <br>
        <h5  style="text-align: center; color: green;"><i>เรามุ่งมั่นพัฒนาผลิตภัณฑ์ เพื่อตอบสนองลูกค้ามาเป็นเวลายาวนาน</i></h5>
        <!-- Section-->
        <section class="">
            <div class="container-fluid px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-4">
                        <div class="card h-60 w-100">
                            <!-- Product image wrapper - Center image -->
                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <img src="img\badge.png" alt="..." width="70" height="70"/>
                            </div>
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h3 class="fw-bolder">คุณภาพดี</h3>
                                    <!-- Product price-->
                                    <span class="text-mute text-decoration-line-throught">รับรองความพึงพอใจ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-60 w-100">
                            <!-- Product image wrapper - Center image -->
                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <img src="img\delivery.png" alt="..." width="70" height="70"/>
                            </div>
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h3 class="fw-bolder">ขนส่งรวดเร็ว</h3>
                                    <!-- Product price-->
                                    <span class="text-mute text-decoration-line-throught">ฉับไว ทันใจลูกค้า</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-60 w-100">
                            <!-- Product image wrapper - Center image -->
                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <img src="img\protection.png" alt="..." width="70" height="70"/>
                            </div>
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h3 class="fw-bolder">ปลอดภัย</h3>
                                    <!-- Product price-->
                                    <span class="text-mute text-decoration-line-throught">ไร้สารปนเปื้อน</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-60 w-100">
                            <!-- Product image wrapper - Center image -->
                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <img src="img\admin.png" alt="..." width="70" height="70"/>
                            </div>
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h3 class="fw-bolder">แนะนำถูกใจ</h3>
                                    <!-- Product price-->
                                    <span class="text-mute text-decoration-line-throught">ตามความต้องการของลูกค้า</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-2 mb-5" style="max-height:600px">
                    <div class="row">
                    <div class="col-6">
                        <img src="img/p2.jpg" style="max-height:600px;" class="img-fluid">
                    </div>
                    <div class="col-6">
                        <h1 class="text-center mt-5" style="color:#aebdac"><strong><i>ถุงพลาสติก</i></strong></h1>
                        <p style="color:#aebdac" class="text-center">ถุงหูหิ้ว HDPE, ถุงร้อน PP, ถุงเย็น LLDPE และถุงสั่งทำ</p>
                        <h4 class="mt-5 text-center px-5">เราเป็นผู้เชียวชาญการผลิตและจำหน่ายผลิตภัณฑ์บรรจุภัณฑ์เกี่ยวกับถุงพลาสติกหลากหลายรูปแบบที่เหมาะสมกับการใช้งานของลูกค้า 
                            โดยเราเน้นการคัดสรรวัตถุดิบที่มีคุณภาพ และ สะอาดปลอดภัยต่อผู้ใช้งาน</h4>
                        <div class="mt-5 text-center">
                            <a class="btn btn-primary" href="product.php" style="background-color:brown;border-color:brown;"><i>หน้าสินค้า</i></a>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                   <div class="col-4 ">
                        <img src="img/Test.jpg" class="rounded rounded-circle img-fluid" style="max-height: 320px;">
                        <div class="card d-flex justify-content-between border border-dark mt-2 mb-2 text-center" style="max-width: 236px;">
                        <h5>ถุง HDPE <br> เนื้อขาวขุ่น</h5>
                    </div>
                   </div>
                   <div class="col-4 ">
                        <img src="img/ถุงPPรวม.jpg" class="rounded rounded-circle img-fluid" style="max-height: 320px;">
                        <div class="card d-flex justify-content-between border border-dark mt-2 mb-2 text-center" style="max-width: 236px;">
                        <h5>ถุง LLDPE <br> เนื้อใส - นิ่ม</h5>
                    </div>
                   </div>
                   <div class="col-4">
                        <img src="img/ถุงเย็นLLรวม.jpg" class="rounded rounded-circle img-fluid" style="max-height: 320px;">
                        <div class="card d-flex justify-content-between border border-dark mt-2 mb-2 text-center" style="max-width: 236px;">
                        <h5>ถุง PP <br> เนื้อใสมาก</h5>
                    </div>
                   </div>
                </div>
                <div>
                <div class="card mt-2 mb-5" style="max-height:600px;">
                    <div class="row">
                    <div class="col-5">
                        <img src="img/p1.gif" height="600px" width="auto" class="img-fluid">
                    </div>
                    <div class="col-6">
                        <h1 class="text-center mt-5" style="color:#aebdac"><strong><u>แผ่นบรรจุอาหาร</u></strong></h1>
                        <p style="color:#aebdac" class="text-center">ถุงหูหิ้ว HDPE, ถุงร้อน PP, ถุงเย็น LLDPE และถุงสั่งทำ</p>
                        <h4 class="mt-5 text-center px-5">กระดาษเคลือบพลาสติกหรือแผ่นพลาสติก สำหรับห่ออาหารที่ สะอาด และปลอดภัย  
                            ได้มาตราฐาน ด้วยความใส่ใจดูแลทุกขั้นตอนการผลิตอย่างละเอียด</h4>
                        <div class="mt-3 text-center">
                            <a class="btn btn-primary" href="product.php" style="background-color:brown;border-color:brown;"><i>หน้าสินค้า</i></a>
                        </div>
                    </div>
                </div>
                </div>
                </div>
                </div>
        </section>
        <!-- Footer-->
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
    </body>
</html>
<?php 
        }
?>