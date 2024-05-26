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
                    <div class="card-header px-4 py-5">
                        <h5 class="mb-0"><?php echo $got['o_date'];?> <span style="color: #a8729a;"></span></h5>
                        <div class="mt-2 text-muted">
                        <?php echo $got['c_name'];?><br>    
                        </div>
                        <div class="text-muted mb-0 col-12">
                            <?php echo $got['o_address'];?>
                        </div>
                        <span>
                            <a href="recipe.php?date=<?php echo $got['o_date'];?>" class="btn btn-primary mt-2">ใบเสร็จรับเงิน</a>
                            <a class="btn btn-warning mt-2" href="refund.php?date=<?php echo $date; ?>">แจ้งคืนสินค้า</a>
                        </span>
                </div>

                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="small text-muted mb-0">เลขที่อ้างอิง : <?php echo $got['o_ref']?></p>
                        </div>
                        <?php 
                            $price = 0;
                            $total_price = 0;
                            $sum_price = 0;
                            $sum_weight = 0;
                        foreach($fecth as $list){
                            $price = $list['d_quantity'] * $list['p_price'];
                            $total_weight = ($list['d_quantity'] * $list['p_weight']) / 1000;
                        ?>
                        <div class="card shadow-0 border mb-4">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-2">
                                <img src="../Admin/uploads/product_img/<?php echo $list['p_img']; ?>"
                                class="img-fluid" alt="Phone">
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0"><?php echo $list['p_name']; ?></php></p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0 small"><?php echo $list['p_color']; ?></p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0 small">จำนวน : <?php echo $list['d_quantity'];?> ชิ้น</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0 small">น้ำหนัก : <?php echo $total_weight; ?> กก.</p>
                            </div>
                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                <p class="text-muted mb-0 small"><?php echo number_format($price,2);?> ฿</p>
                            </div>
                            </div>
                            <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                            <div class="row d-flex align-items-center">
                            </div>
                        </div>
                        </div>
                        <?php 
                            $total_price += $price;
                            $sum_weight += $total_weight;
                            }
                        ?>
                        <div class="d-flex justify-content-between mb-3">
                            <div class="">สถานะสินค้า : </div>
                                <?php 
                                if($got['r_code'] = 0){
                                ?>
                                <div class="text-dark"><?php echo $got['o_status']; ?>
                            </div>                         
                            <?php 
                                }else{
                            ?>
                            <div class="text-danger"><?php echo $got['o_status']?></div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                        <h5 class="text-muted mb-0">ราคารวม</h5>
                        <h5 class="text-muted mb-0"><strong><?php echo number_format($total_price,2);?> ฿</strong></h5>
                        </div>
                        <form id="confirmForm" method="post" action="detail.update.php">
                        <div class="" align="center">
                        <a class="btn btn-danger" href="purchase.history.php">กลับสู่หน้าที่แล้ว</a>
                        <input type="hidden" id="date" name="date" value="<?php echo $date; ?>">
                        <input type="hidden" name="confirmation" value="">
                        <?php if(isset($got['o_send'])){?>
                        <button class="btn btn-outline-success" onclick="handleConfirmation()">ได้รับสินค้าเรียบร้อยแล้ว</button>
                        <?php
                        }?>
                        </div>
                        </form>
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
            <script>
                function handleConfirmation() {
                    const confirmed = confirm("ยืนยันการรับสินค้า");
                    document.getElementById("confirmForm").confirmation.value = confirmed ? "yes" : "no";
                    document.getElementById("confirmForm").submit();
                }
            </script>
    </body>
</html>

<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<?php 
    }
?>