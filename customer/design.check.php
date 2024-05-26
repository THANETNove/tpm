<?php 
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Access form data
        $productType = $_POST['productTypes']; // Product type
        $productSize = $_POST['productSize']; // Product size
        $amountBag = $_POST['amountBag']; // Quantity
        $addText = $_POST['addText']; // Additional text

        // Access uploaded image data
        $imageName = $_FILES['imgScreen']['name']; // Image name
        $imageTempName = $_FILES['imgScreen']['tmp_name']; // Temporary image path

        // Move uploaded image to desired location
        $targetDirectory = "uploads/design_img"; // Specify target directory
        $targetFilePath = $targetDirectory . $imageName; // Path to store the uploaded image

        // Move the uploaded image to the target directory
        if (move_uploaded_file($imageTempName, $targetFilePath)) {
           
        } else {
            echo "<p>Sorry, there was an error uploading your file.</p>";
        }
    ?>
<?php 
    require_once('fn.php');
    require_once('dbcon.php');
    
    if(!isset($_SESSION['userId']) OR ($_SESSION['userStatus'] = "No"))
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
      }
      .form-color{
        background-color : white;
        border-radius: 10px;
      }
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
    <body>
    <?php 
            require_once("nav.inc.php");

            $sql = "SELECT * FROM product WHERE p_size = '".$productSize."' AND p_type = '".$productType."'";
            $query = mysqli_query($mysqli,$sql);
            $row = mysqli_fetch_assoc($query);

            $cus = "SELECT * FROM customer WHERE c_id = '".$_SESSION['userId']."'";
            $get = mysqli_query($mysqli,$cus);
            $show = mysqli_fetch_assoc($get);
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
       <!-- Section-->
       <link href="form-validation.css" rel="stylesheet">
  </head>
<div class="container form-color">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPQAAADPCAMAAAD1TAyiAAAAulBMVEX///85OTlLoEI2NjYkJCT29vYpKSlJSUnW1tbw8PAtLS0zMzMsLCxInz8wMDCTk5Onp6cgICA8mjFCnDg+mzO8vLw3mSuwsLDIyMgbGxtXV1eBgYHn5+fa2tqbm5vu9e1qampcqFVCQkJfX1/m8eV5eXl4tXKIiIhNTU32+vbO48xxcXHd7NyUw5CYmJiw0q2NwImhyp672LjH38VmrF9iq1uEu35ur2i3t7cPDw+Tw4+gypzW6NUAAACtT6tMAAAMPklEQVR4nO2dZ0PiTBeGgRRKSCSFUARpomLDjs/q+///1ksQkQxnMu2kLOv1ddckN5ly5rSUShGDdgui0+7WBqXjpHvVM5sNgKZp6q5bvTnrGnk/IzZnPa2chGY19Ma4fVS6O26i5C2WqZ8ez0ivc2mOcHqn9byfFolWk1f0WrbZyftxcegnT2gCfXwUU1tI8/plW8cws6diosuaXsv7kdUZC77qo1AtspB9q/7rR7ihi4ouW9O8H/qHxWI0Oh+NFguxP+MzTmI05ukoEGF0vXxYTSpe+IVfeXl7fD7n/vMThhkK4HZTlMNm9PRWCbzAt+3KDtu2/cCzL5acwrtTHTxvNBqOpYE/iFZOV1USo+UkXOutwNhBOHkccV2o1ro/gbi8mZVd0zpUbbZSlkbj+iIMaIK/dfvhxbXibQbv455z8KqdXCyz5cRjKN7qDidPqvcazF1ylOfxqp9s1kveH+YVZdm1KfGys5/Vn5xveSfbm3wq3tLoEzNbz3gBfwiFJH8N8jfB7ZvEKMdHuJPpXn1b8UUlR/j+s9p9h4TpZuLI4WIp/pq3hH/U7nwan9YZju8/oaTkNcGr0hAf9OLj+xJLE4uLQF7zeohX+I1TgHFsLdOqWKIYvEhN5x9sT2UVb5vx8Z3NCfNVUfOaUGE5M+JHb7ONp4zOhbpmNdXz2FLmnOJJo/KgNJ93KIzw99j4zmJSLz0UzWurVHo1G8S36l7qk/pTYa8iVPvSO1c1ZpU1O0YdB8qRbWHL2iSA6ldZ0Zdx+8QxcfiPsiSiLGLfBHeSorvxTQsJrQnf7RltcG8IJT0L9VREOyfw3Sp4gzvCtiWn9ZWwD5EDdwjea4mzW/3gP8iJvm/ga9auwFstcAd3RHgrJborHhpg0jgDb3WHuYp9Yb9IiS712CJEccHtfoGveW2YyZmjM8AfrAbFsHtMQ7Q9kRItHu9jQTmX467c38i96qF45IsB7IF5RjK6CSRnNRznUcAEbdBVOm9acgG/QZ7U8IY1UtivbGqgqyK7V3eQjTJ4Sj9JGyZ+sHpb+fRVMJAxywbIOzXsf5Ee3eFHJGrxSB0pckvZFHdSg7v0QvZFh98BrCfaQmhfyIg+PQhhKtGD7nEtuXaHy90l3mgjXOrY0Uad1LBp8iFnmYSPP5e4pQ1wKXcZfzIpD7B38UVqSnsf+9eg/S//EbojC9RJDZ425OxuL+4amVB+OHslI/oEc1Kb78AdzmV2aY/YgamDxZcRjXq8BI3QZ4nFO3iLX4O+FoYy3mADc1KDO5bECSsgdyLa6F4PCSlfGebxsgdZ3tTthopPal7RL+EvgVsyOUP0GYGh/QvRxdsnF6ek6K7/Ad2TRQ1vUsP5OvShGWEfhAB80pH/lrQo2G/QPVkYeMMbtk2SNNteZTUJYqJ80h+SqFlyzyKi80qiwYNl0th8iQ7Eo/3Anj0hDMs/yUasZIAHz2ek9aHr0x/a/x6an7ukMrtCaP5gGe5yjjIy0QhbNNU22XPs3W5dBQdxC/qpcoeUaDyfkaDoYC/1cbSJ+tg2kfK75LDm5ETPsSxReE5TnztmTC0m/lozYV498ViwcqLfsY6X8OpNtyDjr/XC8wjNXIFOuTlNppQpiAbLQegWJHEWfiB8m1yaZYM7pTLSpBY0TvzkwDpftoacw6h0kJIgjw5dne4WTMyXueVzMjF+OTpoKQkuVKhLP3AcLNb7mjlT4OUOHCVEn5EOBeQTXGQHy/WOc960/0A6k06sGDdBNORESHL12z4cmBklxTVieHKh+TUnSMdL0Nf/mTQ57QByZ474E1Q8Wc1oPqPGPXBxhq8fyPRc8GuW3rHWx0uk5dsCqyKSD9T7Pv2tZsYf7CO9eJfQfEawHfrA8BcR3l6h9Gg5F9kXWMdLMKzDDFp6MQNDKA1eKmy5Bet4CSaRjZhmhv/y8+wJTsBDpO2xDUhvGvT2syZ1pHrybaaIlXgESoV5SCkJcI4kh+fb9jePfytY4uEpFe8gpSTAKxlXYCcIVquKWC2i4uguDZAsUTjR5pWvelY4IVxl7Y5AOl7CKVXo2bDbX0nSgbADKSWhAU5q6QSMZDzV+mKklARKEnAK+bCRu1hRc6mOtVODCbHnaaQMKr9otIz3Jlx0Lx66ZKI8o0toKQmw71spaZCCbBXHPljHS0p9F+vUIcxBEFsGA8kSpaT2o6e5B3z9Txgg+YxoTSWoWX9yhOqrWARWSgKt6F4unYyCLxWLPwQrJcG6ga8/QrRQ1Lfob7CiO7T6c8QaPKlEKhCslIQGrb/CHda7xtittqClJJi0jqRINaZIi9gGtDKWJuQJjhDxcyZolo3kgGBFL8s6reuVgEebrlkq8ZcKWkoCdVaLxC4yec+IKQmUs1ZElGahgC1Za0gHr4zFGlNvslgprOE+JeCnQhUt4z2pWeOD9H7trRS7c0GgpSQkt3V74u85t4+NvIRtQeyS0EhqFjN6kTh9BBP8oR2B5TOK6CU2+3oKBNczP0BetX9A7JLAaFG5uPMEZPvBXQqzeQtmlwRnnHyv0Z+Ab27bQXCH4jGggFvGAvtQflgsbfbr9r3KMr23vAG1Ni15Wm/4fPA9elKNvf7HN9XWmWxwuyRwdXa7vnvd9D8m9K4Fh5M7vDNkArhdErQy32cvFp/Lh5Ufht43YTB5e3xOcyLvg9wlwaqKdBke3X5eR3yepzyJSZC7JDhCqvMCu0uCc/UXqMbukvBXvGvsLgnreV0u/vcfkLsklKO2bIX/1gdyl4SNah3MtCoQuF0StuhZdCVVALdLwjeNKdyQrijgT+oIzWUdP3IFtUvCHma1wC87jSZ8GzS3uF+gQ+2SEMfRz4pqqeA34fuhaeX1dRcGmF0SDtBMp1XEt43YJQGU3XRPi7ekHXRJ0LHp/a98VjTdREqCNaylQLdgxxDCZ0QPQR4TRBlL80i+dMog7jOyZnk/TyYQx0u4RuHYII6X2XyjI2+MeB4dLQfwyCAs0X9jfBM+0WP5UnUyRJkWpRzl2CDGt1t4fyYGxPhOSJE6IshvdFA+NHFkEDGtf8MqIz1lhffXo0CmBP/9XyTnoEXMam36D1goBhnesab/wLu+J9NPNGaO1N+PcegUbbqn3SMf5OSsjnB0vX/aatcG9bqRPnmohkN5mtM0dVc3HSt1yv1W5oGgbgpfWRJC05pu5g6MU/QPDonTy/xYe5ViWIuXzD3QAzOVCL0Q2X4FPaKm56+aWtp2zKr17D0Yw0be8zrDT7/vqPdT+eingOhcfFUneq4vOycH9HDcy092Jp8Dp8nOaffS8vReGJ2+uba3s1aucVS/pEq9fTkrr48aTSfC0jYRXS1NLH1aCI+7Mex2Tk7n8/lNf1peay9Pq6lxdfNPxEt/+eWXX3755RcljMGwNhwgnnzQL4jN8H5mubquu07/HsVArJ30G5sLarPCJQZ/8V7Vd34UraFPlb2zrbLubI8wmtXU+8WzOrtlwl+mmWWlI1C7SRxXNb1oFT2XvcNjpdZTOOHfuNAFCxUZncGeMlM2GcWowqUieuZubjp9WjWLA/fBZWFMaQ4oszCZqGN6BU9jLHPBK3qdn0lt4ZYtraQCHl2i1OoyKTSYfaQSglE+Lx5iqyUGgRltjzKC0VFUPImS0e2N3qMwO4as4LxoEmWbVe4GftM5W5gdA0T98cxqTko/+Cxhl9mKRV7YHTbgL2RmCUdBtVhgkaOXSu5JmRxVtpT27RQ4mrLmXiDE0dkH/iQaDY6e8WK/YgpwNB4UK/LgaLog9iumAE8LVUvkghz12bnXT/CINkUuyCM670oCnuGd1BD2AJ7hPU5JDC8cbe3FXgzHr+jkbYhyfN9U7Bk5toPcTTKODsFi2ypH98Z8Mor2MNjJwD2hDGV290ZNaDdIBeakFl1rmftB7lOaw/jWBY1GqGYgRq8AnmDGcit+JmJM6tx36Yhu8iRM6lUP08H2P6XBPGnXciR8tv2kZcKkfbwkYxK+SyK10tYTMqolPen41Ju0h9QcqbFIzyO3ilPfONDgAWlZkvOvS1HtVAvUnm5wBe0zzar0mjPUoIOHPivMe95w4pJP6bgqRoQxd8nR47h529wHDOZ68+cxraY+V9xaamO38TPILdO8LNDQ3jFozaIs4EZUeDhrIeymg/ur6ILN9QXNWaeIkjcYtXan1WnX0KaeUXuPLihteP4feiYWSghcEYEAAAAASUVORK5CYII=" alt="" width="72" height="57">
      <h2>ตรวจสอบการพิมพ์ลายถุง</h2>
      <p class="lead"></p>
    </div>
    
      <div class="col-md-7 col-lg-8">
        <form action="design.proc.php" method="POST">
        <h4 class="mb-3">ข้อมูลของการพิมพ์ลายถุง</h4>
          <div class="row g-3">
            <div class="col-sm-12 text-center">
              <label for="customerName" class="form-label"></label>
             <img src="<?php echo $targetFilePath; ?>" style="max-height: 300px;">
             <input type="hidden" class="form-control" id="screenImg" name="screenImg" value="<?php echo $imageName; ?>" readonly>
            </div>

            <div class="col-12">
              <label for="productType" class="form-label">ประเภทของสินค้า <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="productType" name="productType" value="<?php echo $productType; ?>" readonly>
            </div>

            <div class="col-12">
              <label for="productSize" class="form-label">ขนาดของสินค้า <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="productSize" name="productSize" value="<?php echo $productSize; ?>" readonly>
            </div>

            <div class="col-12">
              <label for="amountBag" class="form-label">จำนวนสินค้า <span class="text-muted"></span></label>
              <input type="number" class="form-control" id="amountBag" name="amountBag" value="<?php echo $amountBag; ?>" readonly>
            </div>

            <?php 
            $total_price = 0;
            $total_price = $row['p_price'] * $amountBag;
            ?>

            <div class="col-12">
              <label for="addText" class="form-label">ข้อความเพิ่มเติม <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="addText" name="addText" value="<?php echo $addText ?>" readonly>
            </div>

            <div class="col-12">
              <label for="customerName" class="form-label">ชื่อ-สกุล <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="customerName" name="customerName" value="<?php echo $show['c_name']; ?>" >
            </div>

            <div class="col-12">
              <label for="customerTel" class="form-label">เบอร์โทรศัพท์ <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="customerTel" name="customerTel" value="<?php echo $show['c_tel']; ?>" >
            </div>

            <div class="col-12">
              <label for="customerMail" class="form-label">E-mail <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="customerMail" name="customerMail" value="<?php echo $show['c_mail']; ?>" >
            </div>
            
            <div class="col-12">
                <label for="" class="form-label">เลือกที่อยู่สำหรับการจัดส่ง</label>
                <select class="form-control" id="selectedAddr" name="selectedAddr">
                  <option name="noAddr" id="noAddr" value="noAddress">กรุณาเลือกที่อยู่สำหรับจัดส่ง</option>
                    <option name="stAddr" id="stAddr" value="<?php echo $show['c_addr1']?>">ที่อยู่ลำดับที่ 1 </option>
                    <option name="ndAddr" id="ndAddr" value="<?php echo $show['c_addr2']?>">ที่อยู่ลำดับที่ 2 </option>
                    <option name="thAddr" id="thAddr" value="<?php echo $show['c_addr3']?>">ที่อยู่ลำดับที่ 3 </option>
                </select>
            </div>
            <div class="col-12">
                <label for="address" class="form-label">ที่อยู่สำหรับจัดส่ง</label>
                <textarea class="form-control" id="address" name="address" placeholder="" value="" required></textarea>
                <div class="invalid-feedback">
                    กรูณาใส่ข้อมูลที่อยู่สำหรับจัดส่ง
                </div>
            </div>

          <h4 class="mb-3">การชำระเงิน</h4>
          <input type="number" class="form-control hidden" id="payPrice" name="payPrice" value="<?php echo $sum_price;?>">
          <img src="../admin/uploads/qr_code_img/qr_code_personal.jpg" style="width: 350px; height: auto;" alt="QR Code"> 
          
          <div class="col-12">
              <label for="totalPrice" class="form-label">ราคาสินค้า <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="totalPrice" name="totalPrice" value="<?php echo number_format($total_price,2); ?>" readonly>
            </div>

          <div class="mb-3">
            <label for="productPrice" class="form-label">หลักฐานการโอนเงิน : </label>
            <img id="preview" src="#" alt="Image Preview" style="display:none; max-width: 300px; max-height: 300px;" class="border border-3">
            <br>
            <input class="form-control" type="file" id="qrImg" name="qrImg" accept="image/*" onchange="previewImage()" required>
          </div>
          <div class="my-4 text-center">
          <a href="design.php" class="btn btn-danger btn-md">กลับสู่หน้าที่แล้ว</a>
          <button class="btn btn-primary btn-md" type="submit">ส่งคำสั่งซื้อ</button>
          <div><br></div>
      </div>
    </div>
        </form>
    </div>
              </div>
  </main>
</body>
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
</html>

<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
 // Add an event listener to the dropdown
 document.getElementById("selectedAddr").addEventListener("change", function() {
        // Get the selected value from the dropdown
        var selectedValue = this.value;

        // Update the delivery address input field
        document.getElementById("address").value = selectedValue;
    });

function previewImage() {
    var input = document.getElementById('qrImg');
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
</script>
<?php 
    }
}
?>