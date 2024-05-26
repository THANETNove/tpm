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
<style>
    .table-color{
        background-color: darkgrey;
    }
    .text-empty-cart{
        color : red;
    }
    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      align-items: center;
      justify-content: center;
    }

    /* Styling for the modal */
    .modal {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    /* Close button style */
    .close {
      cursor: pointer;
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 20px;
    }
</style>
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
        <?php 

        $query_amount = "SELECT * FROM orders WHERE c_id = ?";
        $query = $mysqli->prepare($query_amount);
        $query->bind_param("s", $_SESSION['userId']);
        $query->execute();
        $count = $query->get_result();
        $select = $count->fetch_assoc();
        $row = $count->num_rows;

        $sql = "SELECT * FROM orders INNER JOIN refund ON orders.o_id = refund.r_id WHERE orders.c_id = ?";
        $prep = $mysqli->prepare($sql);
        $prep->bind_param("s", $_SESSION['userId']);
        $prep->execute();
        $result = $prep->get_result();
        $fecth = $result->fetch_array();

        ?>
        
  <section id="about" class="about-mf sect-pt4 route">
        <div class="container rounded bg-white mt-5 mb-5">
        <div class="container">
            <div class="bg-light py-5 px-5 text-center">
      <div>
      <section class="" style="background-color:white">
      
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col">
        <p><span class="h2">ประวัติการสั่งซื้อ </span><span class="h4"></span></p>
        <div class="mb-3 mt-2">จำนวนรายการสั่งซื้อสินค้า <?php echo $row; ?> รายการ</div>

        <?php 
        if($row > 0){
            $i = 0;
            foreach($count as $list){
            $i = $i+1;
        ?>
        <div class="card mb-4 border-3">
          <div class="card-body p-4">
            <div class="row align-items-center">
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="medium mb-4 pb-2">รหัสอ้างอิง</p>
                  <p class="fw-normal mb-0">#<?php echo $list['o_ref'];?></p>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center">
                <div>
                  <p class="medium mb-4 pb-2">วันที่สั่งซื้อ</p>
                  <p class="fw-normal mb-0">
                    <?php echo $list['o_date'];?>
                  </p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="medium mb-4 pb-2">ราคารวม</p>
                  <p class="fw-normal mb-0"><?php echo number_format($list['o_price'],2);?>฿</p>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center">
                <div>
                  <p class="medium mb-4 pb-2">สถานะ</p>
                  <p class="fw-normal mb-0"><?php echo $list['o_status']?></p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="fw-normal mb-0">
                    <a class="btn btn-primary btn-lg" href="detail.purchase.php?date=<?php echo $list['o_date']; ?>"><i class="bi bi-search"></i></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php 
                }
            }else{
        ?>
        <div class="mt-5 text-light rounded-pill" style="height:70px; background-color: red;"><br>
                <h4 class="mb-3">ผู้ใช้นี้ยังไม่มีรายการสั่งซื้อสินค้า</h4>
        </div>
        <?php 
        }
        ?>
        </div>
        </div>
        </div>
      </div>
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

<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<?php 
    }
?>