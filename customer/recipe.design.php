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
        background-color: orange;
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
        <link href="css/styles.css" rel="stylesheet"/>
    </head>
    <style>
        body{
            background-color: #7DCEA0;
        }
        .section{
            display: flex;
            flex-direction: column;
            min-height: calc(100vh - 225px);
        }
        footer{
            margin-top: auto;
        }
        .table-head-color{
            background-color: lightgray;
        }
        .table-body-color{
            background-color: lightcyan;
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

        $date = $_GET['date'];
        $status = "Ordered";
        $refund = "Refund";


        $od = "SELECT * FROM order_detail INNER JOIN product ON order_detail.p_id = product.p_id WHERE o_date = ? and (d_status = ? OR d_status = ?) and c_id = ?";
        $query = $mysqli->prepare($od);
        $query->bind_param("ssss",$date,$status,$refund,$_SESSION['userId']);
        $query->execute();
        $fecth = $query->get_result();
        $row =  $fecth->fetch_assoc();

        $pd = "SELECT * FROM orders INNER JOIN order_detail ON orders.c_id = ?";
        $get_pd = $mysqli->prepare($pd);
        $get_pd->bind_param("s",$_SESSION['userId']);
        $get_pd->execute();
        $result = $get_pd->get_result();
        $got = $result->fetch_assoc();

        ?>
    <section>
    <br>
    <div class="row d-flex justify-content-center align-items-center mb-3 mt-2">
                <div class="col-lg-10 col-xl-8">
                    <div class="card" style="border-radius: 10px;">
                    <div class="card-header px-4 py-4">
                        <h3 class="text-muted text-center">ใบเสร็จรับเงิน</h3>
                        <div class="row  text-muted mt-3"><div class="col-2"></div>
                            <h6 class="col-5">วันที่สั่งซื้อ : <?php echo $got['o_date'];?></h6>
                            <h6 class="col-5">หมายเลขคำสั่งซื้อ : <?php echo $got['o_ref'];?></h6>
                        </div>
                        <div class="row  text-muted mt-3"><div class="col-2"></div>
                            <h6 class="col-5">ชื่อ-สกุล : <?php echo $got['c_name']?></h6>
                            <h6 class="col-5">E-mail : <?php echo $got['c_mail']?></h6>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="text-muted">รายการสินค้าที่สั่งซื้อ</div>
                        </div>
                        <table class="table table-stripe table-hover">
                            <thead class="table table-dark">
                            <tr class="text-center">
                                <td width="30%"></td>
                                <td width="25%">ชื่อสินค้า</td>
                                <td width="15%">จำนวนสินค้า</td>
                                <td width="15%">ราคาสินค้า</td>
                                <td width="15">ราคารวม</td>
                            </tr>
                            </thead>
                        <?php 
                            $price = 0;
                            $total_price = 0;
                            $sum_price = 0;
                            $sum_weight = 0;
                        foreach($fecth as $list){
                            $price = $list['d_quantity'] * $list['p_price'];
                            $total_weight = ($list['d_quantity'] * $list['p_weight']) / 1000;
                            $total_price += $price;
                        ?>
                        <tbody class="table table-light">
                        <tr>
                                <td><img class=" p-3" src="../Admin/uploads/product_img/<?php echo $list['p_img']?>" style="max-height: 200px;"></td>
                                <td><?php echo $list['p_name'];?></td>
                                <td class="text-center"><?php echo $list['d_quantity'];?></td>
                                <td class="text-end">฿<?php echo number_format($list['p_price'],2);?></td>
                                <td class="text-end">฿<?php echo number_format($price,2);?></td>
                        <?php              
                            $sum_weight += $total_weight;
                            }
                        ?>
                            </tr>
                        </tbody>
                        </table>
                        <div class="d-flex justify-content-between mb-1 p-1">
                        <div class="text-muted">ค่าจัดส่ง</div>
                        <div class="text-muted"><?php echo number_format(50,2);?>฿</div>
                        </div>
                        <?php if($sum_weight > 30){?>
                        <div class="d-flex justify-content-between mb-1 p-1" style="background-color:lightgray;">
                        <div class="">ส่วนลดค่าจัดส่ง</div>
                        <div class=""><?php echo number_format(-50,2);?>฿</div>
                        </div>
                        <?php } ?>
                        <div class="d-flex justify-content-between mb-1 p-1">
                        <div></div>
                        <div class="text-muted"><strong>รวม <?php echo number_format($total_price,2);?> ฿</strong></div>
                        </div>
                        <div class="text-center text-muted">
                            ____________________________________________________________________________________________________________________________________________
                        </div>
                        <div class="mt-3">
                            <div class="text-center">
                                โปรดเก็บสำเนาใบเสร็จนี้ไว้อ้างอิง
                            </div>
                            <div class="text-center mt-2">
                                <a class="" href="purchase.history.php">
                                    ดูประวัติการสั่งซื้อทั้งหมด
                                </a>
                            </div>
                            <div class="text-center mt-2 mb-3">
                                <a class="" href="product.php">
                                    ดูสินค้าอื่นๆ เพิ่มเติม
                                </a>
                            </div>
                        </div>
                        <div class="text-center text-muted">
                            ____________________________________________________________________________________________________________________________________________
                        </div>
                        <div>
                            <div></div>
                        </div>
                        <div class="mt-5" align="center">
                        <a class="btn btn-danger" href="purchase.history.php">กลับสู่หน้าที่แล้ว</a>
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

<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<?php 
    }
?>