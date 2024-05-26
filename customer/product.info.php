<?php 

    require_once("dbcon.php");
    require_once("fn.php");

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
        .container-color {
            color: white;
        }
        .bg-color{
            background-color:#1C2833;
            border-radius: 10px;
        }
        .border-circle{
            border-radius: 10px;
        }
        .txt-color{
            color:white;
        }
        .hide{
            display: none;
        }
        .custom-button{
          width: 500px;
          height: 40px;
          display: inline-block;
          background-color: white;
        }
        .button-bordless{
            outline: white;
        }
        .text-outline{
            text-shadow: 0 0 5px red;
        }
    </style>
    <body>
    <?php 
            include("nav.inc.php");

            $id = $_GET['id'];

            $sql = "SELECT * FROM product WHERE p_id = $id";
            $query = mysqli_query($mysqli,$sql);
            $row = mysqli_fetch_array($query);
        ?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container-fluid px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">T P M</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Thai</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <br>
        <div class="container px-4 px-lg-5 bg-light border-circle">
            <!-- Heading Row-->
            <br>
            <form action="cart.add.php" method="post">
            <div class="row gx-4 gx-lg-5 align-items-center my-5 ">
                <div class="col-lg-6"><img class="img-fluid rounded mb-4 mb-lg-0" src="../admin/uploads/product_img/<?php echo $row['p_img']; ?>" height="580px" width="420px" alt="..." /></div>
                <div class="col-lg-5 bg-color txt-color">
                    <br>
                    <input type="text" class="hide" name="product_id" id="product_id" value="<?php echo $row['p_id'];?>"></input>
                    <h2 class="font-weight-light"><?php echo $row['p_name']?></h2>
                    <h4 class="text-start text-outline"><?php echo $row['p_price']," ฿"?></h4>
                    <h6><?php echo "ประเภทของสินค้า : ",$row['p_type']?></h6>
                    <h6><?php echo "ความหนา : ",$row['p_thick']," ไมครอน"?></h6>
                    <h6><?php echo "ขนาด : ",$row['p_size']," นิ้ว"?></h6>
                    <h6><?php echo "สี : ",$row['p_color']?></h6>
                    <h6><?php echo "น้ำหนัก : ",$row['p_weight']," กรัม/ซอง"?></h6><br>
                    <label class="col-6">จำนวนสินค้า : </label>
                    <label class="col-3" for="productSize">ขนาด : </label>
                    <div class="row text-end">
                    <div class="col-6">
                        <input class="form form-control" type="number" id="quantity" name="quantity" value="1" min="1" max="999999"><br>
                    </div>
                    <?php
                        if(($row['p_size']) > 0){
                    ?>
                    <div class="col-6">
                        <input type="text" class="form form-control" id="productSize" name="productSize" value="<?php echo $row['p_size']; ?>" readonly>
                    </div>
                    <?php }else{ ?>
                    <div class="col-6">
                        <select class="form form-control" id="productSize" name="productSize">
                                <option value="4.5x6">4.5 x 6</option>
                                <option value="4.5x7">4.5 x 7</option>
                                <option value="5x8">5 x 8</option>
                                <option value="6x9">6 x 9</option>
                                <option value="7x11">7 x 11</option>
                                <option value="8x12">8 x 12</option>
                        </select>
                    </div>
                    <?php } ?>
                    <button class="btn btn-info custom-button"  type="submit"><img src="https://icons.veryicon.com/png/o/miscellaneous/linear-icon-58/cart-plus-solid.png" width="20" height="20"></button>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
            </form>
            <!-- Call to Action-->
            <!-- Content Row-->
            <div class="row">
            <button class="btn btn-outline-secondary text-start text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#howAndKeep" aria-expanded="false" aria-controls="multiCollapseExample2">วิธีใช้งานและเก็บรักษา</button>
            <div class="col-12">
                <div class="collapse multi-collapse" id="howAndKeep">
                <div class="card card-body">
                    <h6><strong>วิธีใช้งาน</strong></h6>
                    <div>&emsp; ใช้บรรจุหรือห่อหุ้มสิ่งของ</div> 
                    <h6><strong>วิธีเก็บรักษา</strong></h6>      
                    <div>&emsp; เก็บให้ห่างจากเปลวไป หรือวัตถุไวไฟ และความชื้น</div> 
                    <div>&emsp; เก็บให้ห่างจากความร้อน หรือ ในที่แสงแดดส่องถึง</div> 
                    <div>&emsp; เก็บในที่มีอากาศถ่ายเทได้ดี</div> 
                </div>
                </div>
            </div>
            <button class="btn btn-outline-secondary text-start text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#suggestion" aria-expanded="false" aria-controls="suggestion">คำแนะนำ</button>
            <div class="col-12">
                <div class="collapse multi-collapse" id="suggestion">
                <div class="card card-body">
                    <div>ควรทิ้งถุงที่ไม่ใช้แล้ว ลงในถังขยะ</div>
                    <div>ควรใช้ถุงเท่าที่จำเป็น หรือนำกลับมาใช้ซ้ำ เพื่อลดขยะ และรักษาสิ่งแวดล้อม</div>
                </div>
                </div>
            </div>
            </div>
            <br>
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
    </body>
</html>
