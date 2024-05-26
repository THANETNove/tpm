<?php 

require_once("dbcon.php");
require_once("fn.php");

$sql = "SELECT * FROM product";
$get_products = $mysqli->query($sql);


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
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    </head>
    <style>
         body{
            background-color: #7DCEA0;
        }
        .hidden{
                display: none;
        }
        a{
            text-decoration: none;
            color: black;
        }
        a:hover{
            text-decoration: none;
            color: green;
        }
        a:visited{
            text-decoration: none;
            color: black;
        }   
        a:active{
            text-decoration: none;
            color: black;
        }
    </style>
    <body>
        <?php 
            include("nav.inc.php");
        ?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">T P M</h1>
                    <h2 class="lead fw-normal text-white-50 mb-0">บริษัท ไทยเทคนิค พลาส-แมช จำกัด</h2>
                </div>
            </div>
        </header>
        <!-- Section-->
        <?php 
                                $i = 1;
                                foreach ($get_products as $product){
                                    $id  = $product['p_id']; 
                            ?>
        <form method="post">
        <section class="py-5">
            <div class="container px-4 px-lg-10 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"></div>
                            <!-- Product image-->
                            <h6 class="hidden"><?php echo $product['p_id']?></h6>
                            <img class="card-img-top" src="../admin/uploads/product_img/<?php echo $product['p_img'];?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $product['p_name']?></h5></a>
                                    <!-- Product reviews-->
                                    <!--div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div-->
                                    <!-- Product price-->
                                    <div>
                                        <span class="text-muted">ขนาด <?php echo $product['p_size']?> นิ้ว</span>
                                        <span class="text-muted">น้ำหนัก <?php echo $product['p_weight']?> กรัม</span>
                                    </div>
                                        <span class="text-muted">ความหนา <?php echo $product['p_thick']?> นิ้ว</span>
                                    
                                    <!--span class="text-muted text-decoration-line-through">150.00 บาท</!--span--><br>  
                                    <div class="text-center">ราคา <?php echo $product['p_price']?> บาท </div>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">  
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="product.info.php?id=<?php echo $product['p_id']?>">ดูรายละเอียด</a>
                                <a class="btn btn-outline-success mt-auto" href="cart.add.php?id=<?php echo $product['p_id']?>">เพิ่มในตะกร้า</i></a></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    </form>
<?php    
                            }
?>
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
