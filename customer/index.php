<?php 
    require_once('fn.php');
    require_once('dbcon.php');
    if(!isset($_SESSION['login_username']))
    {
        redirect('login.php');
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
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">T P M</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">หน้าหลัก</a></li>
                        <li class="nav-item"><a class="nav-link" href="news.php">ข่าวสาร</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">บริการ</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="shop.php">สินค้า</a></li>
                                <li><a class="dropdown-item" href="design.php">สกรีนถุง</a></li>
                                <!--li><hr class="dropdown-divider" /></+li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>-->
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="about.php">เกี่ยวกับเรา</a></li>
                    </ul>
                    <form class="d-flex">
                        <a class="btn btn-outline-dark" href="cart.php">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </a>
                        <?php 
                            echo '<li><button class="btn btn-black-text btn-outline-dark"><a href="logout.php">, '.$_SESSION['login_name'].'</a></button></li>';
                        ?>
                    </form>
                </div>
            </div>
        </nav>
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
        <p  style="text-align: center; color: green;">เรามุ่งมั่นพัฒนาผลิตภัณฑ์ เพื่อตอบสนองลูกค้ามาเป็นเวลายาวนาน</p>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
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
            </div>
            <div class="container mt-5">    
        <div class="row">
            <!-- Left side (image) column -->
            <div class="col-md-5">
                <img src="img\p2.jpg" alt="Image" class="img-fluid ml-4" width="500" height="500">
            </div>
            <!-- Right side (text) column -->
            <div class="col-md-5" style="background-color:#EAFAF1">
                <div class="p-4">
                    <h2 align="center">ถุงพลาสติก</h2>
                    <h4>เราเป็นผู้เชียวชาญการผลิตและจำหน่ายผลิตภัณฑ์บรรจุภัณฑ์เกี่ยวกับถุงพลาสติกหลากหลายรูปแบบที่เหมาะสมกับการใช้งานของลูกค้า โดยเราเน้นการคัดสรรวัตถุดิบที่มีคุณภาพ และ สะอาดปลอดภัยต่อผู้ใช้งาน</h4>
                </div>
            </div>
        </div>
    </div>

        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
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