<?php 

require_once('dbcon.php');
require_once('fn.php');
$_SESSION['cart'] = 0;

if(isset($_SESSION['userId'])){
$sql_join = "SELECT * FROM cart WHERE c_id = '$_SESSION[userId]'";
        $result_join = $mysqli->query($sql_join);
        $num_rows = $result_join->num_rows;
        $_SESSION['cart'] = $num_rows;
}
?>  
<style>
    .hidden{
        display: none;
    }
</style>
<!-- Navigation-->
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">T P M</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">หน้าหลัก</a></li>
                        <li class="nav-item"><a class="nav-link" href="news.php">ข่าวสาร</a></li>
                        <li class="nav-item"><a class="nav-link" href="product.php">สินค้า</a></li>
                        <li class="nav-item"><a class="nav-link" href="design.php">สกรีนถุง</a></li>
                        <!--li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">บริการ</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="shop.php">สินค้า</a></li>
                                <li><a class="dropdown-item" href="design.php">สกรีนถุง</a></li>
                                <li><hr class="dropdown-divider" /></+li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>>
                            </ul>
                        </li-->
                        <li class="nav-item"><a class="nav-link" href="about.php">เกี่ยวกับเรา</a></li>
                    </ul>
                    <form class="d-flex"><a href="cart.php">
                    
                    <a href="cart.php" class="btn btn-black-text btn-outline-dark">
                        <i class="bi-cart-fill me-1"></i>
                        ตะกร้า
                        <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $_SESSION['cart'];?></span>
                    </a>    
                        </button></a>
                        <?php 
                        if(isset($_SESSION['userId'])){
                            $sql = "SELECT * FROM customer WHERE c_id = '$_SESSION[userId]'";
                            $result = mysqli_query($mysqli,$sql);
                            $row = mysqli_fetch_assoc($result);

                            ?>
                            <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                            <div class=""><?php 
                                if(!empty($_SESSION['username'])){
                                    echo $_SESSION['username'];
                                }else{
                                    echo $_SESSION['userMail'];
                                }
                               ?></div>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="user_info.php">ข้อมูลส่วนตัว</a></li>
                                <li><a class="dropdown-item" href="purchase.history.php">ประวัติการสั่งซื้อ</a></li>
                                <li><a class="dropdown-item" href="pass.change.php">เปลี่ยนรหัสผ่าน</a></li>
                                <li><a class="dropdown-item" href="history.php">ประวัติการเข้าใช้งาน</a></li>
                                <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                            </ul>
                            </div>
                            <?php 
                        }else{
                            ?>
                          <a href="login.php" class="btn btn-black-text btn-outline-dark">เข้าสู่ระบบ</a>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </nav>