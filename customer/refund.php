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
        img{
            max-width: 100%;
            height: auto;
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

        $od = "SELECT * FROM order_detail INNER JOIN product ON order_detail.p_id = product.p_id WHERE o_date = ? AND d_status = ? AND c_id = ?";
        $query = $mysqli->prepare($od);
        $query->bind_param("sss",$date,$status,$_SESSION['userId']);
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
                    <div class="card-header px-4 py-5" align="center">
                        <h2 class="mb-0">การแจ้งการคืนสินค้า<span style="color: #a8729a;"></span></h2>
                    </div>

                    <div class="card-body p-4">
                    <div class="card shadow-1 border mb-3 px-3 py-3">
                        <?php 
                            $price = 0;
                            $total_price = 0;
                            $sum_price = 0;
                            $sum_weight = 0;
                        foreach($fecth as $list){
                            $price = $list['d_quantity'] * $list['p_price'];
                            $total_weight = ($list['d_quantity'] * $list['p_weight']) / 1000;
                        ?>
                        <div class="card shadow-0 border mb-2">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-2">
                                <img src="../Admin/uploads/product_img/<?php echo $list['p_img']; ?>" height="auto"
                                class="img-fluid" alt="">
                            </div>
                            <div class="col-md-6 d-flex p-4 align-items-center">
                                <p class="text-muted mb-0"><?php echo $list['p_name']; ?></p>
                            </div>
                              <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                  <div class="text-muted mb-0 "><?php echo $list['d_quantity']?></div>
                              </div>
                              <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                  <div class="text-muted mb-0 "><?php echo number_format($price,2);?> ฿</div>
                              </div>
                            </div>
                            <div class="row d-flex align-items-center">
                            </div>
                        </div>
                        </div>
                        <?php 
                            $total_price += $price;
                            $sum_weight += $total_weight;
                            }   
                        ?>
                        <div class="d-flex justify-content-between mb-2">
                            <h5 class="text-muted mb-0 mt-2">ราคารวม</h5>
                            <h5 class="text-muted mb-0 mt-2"><strong><?php echo number_format($total_price,2);?> ฿</strong></h5>
                        </div>
                        </div>
                        <div class="container mt-5 bg-white p-4 rounded">
                            <div class="card border-0">
                            <form action="refund.check.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                <div class="mb-1 mt-1">
                                   <input type="hidden" id="orderId" name="orderId" value="<?php echo $got['o_id'];?>">
                                   <input type="hidden" id="detailDate" name="detailDate" value="<?php echo $got['o_date'];?>"
                                </div>
                                <label for="causeText" class="form-label">เหตุผลที่คืนสินค้า</label>
                                <select type="email" class="form-control" id="causeText"  name="causeText" aria-describedby="emailHelp">
                                    <option value="ได้รับสินค้าไม่ครบ">ได้รับสินค้าไม่ครบ</option>
                                    <option value="ได้รับสินค้าไม่ตรงตามที่สั่ง">ได้รับสินค้าไม่ตรงตามที่สั่ง</option>
                                    <option value="สินค้าสภาพไม่ดี">สินค้าสภาพไม่ดี ได้รับความเสียหาย</option>
                                    <option value="สินค้าไม่ตรงกับรายละเอียด">สินค้าไม่ตรงกับรายละเอียด</option>
                                </select>
                                <div class="mt-3 mb-3">
                                    <label class="form-label" for="textNote">คำอธิบายเพิ่มเติม/ข้อเสนอแนะ</label>
                                    <textarea class="form-control" type="text" id="textNote" name="textNote"></textarea>
                                </div>
                                </div>
                                <div class="mb-3">
                                    <label for="imgsProve" class="form-label">รูปภาพ</label>
                                    <div class="card px-1 py-1 border-0">
                                    <div src="" width="500" class="mb-3" id="imgsPreview"></div>
                                        <div class="col-4"><input type="file" class="form-control " id="imgsProve" name="imgsProve" multiple accept="image/*" onchange="previewImages()"></div>
                                    </div>
                                    <label for="videoFile" class="form-label mt-3">วิดีโอ</label>
                                    <div src="" width="500" class="mb-3" id="">
                                        <div class="col-4">
                                            <input type="file" class="form-control" id="videoFile" name="videoFile" multiple accept="video/*" onchange="checkFileSize(event)"></div>
                                            <video id="videoPreview" class="mt-3 mb-3" width="400" controls style="display: none;"></video>
                                        </div>
                                </div>
                        </div>
                        <div class="" align="center">
                        <a class="btn btn-primary" href="purchase.history.php">กลับสู่หน้าที่แล้ว</a>
                        <button type="submit" class="btn btn-success">แจ้งคืนสินค้า</button>
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
    </body>
</html>

<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    function previewImages() {
        var input = document.getElementById('imgsProve');
        var preview = document.getElementById('imgsPreview');

        // Check if there are no files selected
        if (!input.files || input.files.length === 0) {
            preview.innerHTML = ''; // Clear the preview container
            return; // Exit the function
        }

        // If files are selected, proceed with previewing them
        preview.innerHTML = ''; // Clear previous previews

        for (var i = 0; i < input.files.length; i++) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '300px'; // Adjust the size as needed
                img.style.marginRight = '15px'; // Add some spacing between images
                img.style.marginBottom = '15px';
                img.style.gridRow = '2';
                preview.appendChild(img);
            };
            reader.readAsDataURL(input.files[i]);
        }
    }

 // Function to check file size before previewing the video
    function checkFileSize(event) {
            const file = event.target.files[0];
            const fileSizeLimit = 10 * 1024 * 1024; // 10 MB (adjust as needed)
            const videoFileInput = document.getElementById('videoFile');
            
            if (file && file.size > fileSizeLimit) {
                // Reset the file input to clear the selected file
                videoFileInput.value = '';
                alert('กรุณาอัพโหลดไฟล์วิดีโอขนาดไม่เกิน 10 MB ');
            } else {
                // Proceed to preview the video
                previewVideo();
            }
        }

     // Function to preview the uploaded video
     function previewVideo() {
            const videoFile = document.getElementById('videoFile').files[0];
            const videoPreview = document.getElementById('videoPreview');

            if (videoFile) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    videoPreview.src = event.target.result;
                    videoPreview.style.display = 'block';
                };

                // Read the video file as a data URL
                reader.readAsDataURL(videoFile);
            }
        }

        // Add event listener to the file input
        document.getElementById('videoFile').addEventListener('change', previewVideo);

</script>

<?php 
    }
?>