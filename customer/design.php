<?php 

    require_once("dbcon.php");
    require_once("fn.php");

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
        .container-color {
            color: white;
        }
    </style>
    <body>
    <?php 
            include("nav.inc.php");

            $no_word = "ถุงพับจีบพิมพ์";
            $sql = "SELECT DISTINCT p_type FROM product WHERE p_type NOT LIKE '%" . $no_word . "%'";
            $query = mysqli_query($mysqli,$sql);
            $row = mysqli_fetch_array($query);

            $product_type = isset($_GET['productType']) ? $_GET['productType']: "";

            $sql_stmt = "SELECT DISTINCT p_size,p_price FROM product WHERE p_type = '".$product_type."'";
            $query_stmt = mysqli_query($mysqli,$sql_stmt);
            $row_stmt = mysqli_fetch_assoc($query_stmt);
            
            /*
            $query_stmt = $mysqli->prepare($sql_stmt);
            $query_stmt->bind_param("s",$product_type);
            $query_stmt->execute();
            $get_stmt  = $query_stmt->get_result();
            $price_stmt = $get_stmt->fetch_assoc();*/

        ?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <br>
<div class="container px-4 px-lg-5 mb-0 bg-light">
    <!-- Heading Row-->
    <br>
    <div class="row gx-4 gx-lg-5 align-items-center ">
        <div class="col-lg-7" align="center"><img class="img-fluid rounded mb-4 mb-lg-0">
        <img src="https://static.wixstatic.com/media/e00ca8_6b7f960956ef4f9a9e07ec00c770ca1c~mv2.jpg/v1/crop/x_278,y_0,w_2139,h_2044/fill/w_401,h_375,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/%E0%B8%96%E0%B8%B8%E0%B8%87PP%E0%B8%A3%E0%B8%A7%E0%B8%A1.jpg"
            alt="..." id="preview" name="preview" style="max-width: 300px;">
        </div>
        <div class="col-lg-5">
            <h1 class="font-weight-light mb-5">การพิมพ์ลายถุง</h1>
            <div class="bg-light">
                <label class="mb-2">ประเภทของสินค้า</label>
                <form action="#" method="GET" enctype="multipart/form-data">
                    <select class="form form-control" id="productType" name="productType">
                        <?php
                        foreach ($query as $list) {
                            ?>
                            <option class="form-select"
                                    value="<?php echo $list['p_type']; ?>"><?php echo $list['p_type']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- Second form -->
<div class="container px-4 px-lg-5 mb-3 bg-light">
    <!-- Heading Row-->
    <br>
    <div class="row gx-4 gx-lg-5 align-items-center ">
        <div align="center"></div>
            <div class="bg-light">
                <form action="design.check.php" method="POST" enctype="multipart/form-data">
                    <div>
                    <div>
                        <input type="file" class="form-control mt-3 mb-2" id="imgScreen" name="imgScreen" onchange="previewImage()" required>
                    </div>
                        <label class="mb-2">ขนาด</label>
                        <select class="form form-control" id="productSize" name="productSize">
                            <?php
                            while ($row_stmt = $query_stmt->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row_stmt['p_size'] ?>"
                                        class="form-select"><?php echo $row_stmt['p_size'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" class="form-control" id="productTypes" name="productTypes"
                           value="<?php echo $product_type; ?>">
                    <div>
                        <div>
                            <label class="mt-2 mb-2" for="">จำนวนที่ต้องการ</label>
                            <input type="number" class="form-control mb-2" min="1" step="1" id="amountBag" name="amountBag">
                        </div>
                        <div>
                            <label class="mt-2 mb-2" for="">ข้อความเพิ่มเติม</label>
                            <textarea type="text" class="form-control mb-3" id="addText" name="addText"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-3 mb-3">ยืนยันสำหรับการพิมพ์ลายถุง</button>
                        </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
                        </div>
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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>function previewImage() {
                var input = document.getElementById('imgScreen');
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
                 // Store the selected productType in a JavaScript variable
    var selectedProductType = '<?php echo $product_type; ?>';

// Function to fetch product sizes based on the selected product type
function getProductSizes(productType) {
    // Send an AJAX request to fetch product sizes
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_product_sizes.php?productType=' + productType, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // On success, update the product size dropdown
                document.getElementById('productSizeDropdown').innerHTML = xhr.responseText;
            } else {
                // Handle errors
                console.error('Error fetching product sizes');
            }
        }
    };
    xhr.send();
}

// Auto submit and keep the selected productType
$(document).ready(function(){
    $('#productType').change(function(){
        selectedProductType = $(this).val(); // Update the selected productType
        $(this).closest('form').submit();
    });

    // Set the selected productType after the page loads
    $('#productType').val(selectedProductType);
});

            </script>
    </body>
</html>
<?php 
    }
?>
