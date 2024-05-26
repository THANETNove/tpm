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

        $sql = "SELECT * FROM product";
        $get_product = $mysqli->query($sql);


        ?>
        <!-- Header-->
        <header class="bg-dark py-5" src="img\bg2.jpg">
            <div class="container-fluid px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">T P M</h1>
                    <p class="lead fw-normal text-white-50 mb-0">ผู้ผลิตและจำหน่ายบรรจุภัณฑ์ถุงพลาสติกและกระดาษเคลือบห่ออาหาร ที่คุณภาพดีสะอาด ปลอดภัย 100%</p>
                </div>
            </div>
        </header>
        <br>
        <section>
        <div class="container">
            <div class="text-center mb-5 mt-3">
                <h2 class="" style="color:floralwhite;"><strong>เกี่ยวกับเรา</strong></h2>
            </div>
            <div class="card" style="max-width: 1200px; background-color: #fcf8ed;">
    <div class="row">
        <div class="col-md-5 text-start">
            <img src="img/Office.jpg" alt="Office Building" style="max-width: 427px;" class="img-fluid">
        </div>
        <div class="col-md-6 d-flex align-items-center text-start px-4">
            <div>
                <p>
                    ก่อตั้งเมื่อวันที่ 5 มิถุนายน พ.ศ. 2528. โดยมีจุดประสงค์ที่จะผลิตและจำหน่ายผลิตภัณฑ์บรรจุภัณฑ์ประเภทถุงพลาสติก 
                </p>
                <p>
                    ผู้ก่อตั้งบริษัทมีความเชี่ยวชาญในการสร้างเครื่องแปรรูปพลาสติกมาเป็นบรรจุภัณฑ์ถุงพลาสติกหลากหลายชนิดมาก่อน รวมทั้งเล็งเห็นถึงความจำเป็นของการใช้บรรจุภัณฑ์ถุงพลาสติกในอนาคตว่าจะมีปริมาณเพิ่มขึ้นอย่างต่อเนื่อง
                </p>
                <p>
                    ดังนั้น บริษัท ไทยเทคนิค พลาส - แมช จำกัด จึงได้ถูกก่อตั้งขึ้นเพื่อดำเนินการผลิตสินค้าเกี่ยวกับบรรจุภัณฑ์ถุงพลาสติก โดยเน้นการผลิตสินค้าคุณภาพดีด้วยความเอาใจใส่ในทุกขั้นตอน ทำให้สินค้าของเรามีคุณภาพที่ดี ได้มาตรฐาน สะอาด และปลอดภัย
                </p>
            </div>
        </div>
            </div>
        </div>

            <div class="mt-5 mb-3 row text-fluid">
                <div class="col-3 card" style="max-width: 400;background-color:#f2bf5e;">
                    <strong><h3 class="text-center mt-4" style="color:white">เป้าหมาย</h3></strong>
                    <p class="mt-3 mb-3 px-5 text-center text-light">
                    การผลิตสินค้าที่มีคุณภาพ สะอาด และปลอดภัยสู่ตลาดสากล  เพื่อให้ลูกค้ามั่นใจในผลิตภัณฑ์ของเรา
                    </p>
                </div>
                <div class="col-3 card text-fluid" style="max-width: 400;background-color:#8b8ade">
                    <strong><h3 class="text-center mt-4" style="color:white">บุคคลากร</h3></strong>
                    <p class="mt-3 mb-3 px-5 text-center text-light">
                        เรามุ่งมั่นพัฒนาบคคลากรให้มีความพร้อมในหลายด้าน เพื่อรองรับการทำงานที่มีประสิทธิภาพ
                    </p>
                </div>
                <div class="card col-3 text-fluid" style="max-width: 400;background-color:#d290de">
                    <strong><h3 class="text-center mt-4" style="color:white">ทรัพยากร</h3></strong>
                    <p class="mt-3 mb-3 px-5 text-center text-light">
                        เราสร้างกระบวนการผลิตที่เกิดของเสียให้น้อยที่สุด ลดขยะของเสีย เพื่อรักษาสิ่งแวดล้อมให้น่าอยู่ต่อไป
                    </p>
                </div>
                <div class="card col-3 text-fluid" style="max-width: 400;background-color:#75c1cb">
                    <strong><h3 class="text-center mt-4" style="color:white">พันธมิตร</h3></strong>
                    <p class="mt-3 mb-3 px-5 text-center text-light">
                        เราพร้อมเพิ่มพันธมิตรทางการค้าเพื่อรองรับตลาดที่ขยายตัวในอนาคตอย่างต่อเนื่อง
                    </p>
                </div>
            </div>
        </div>
        </section>
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
    </body>
</html>
