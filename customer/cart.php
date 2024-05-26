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
    <?php 
    require_once('fn.php');
    require_once('dbcon.php');
?>
<style>
    .table-color{
        background-color: darkgray;
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
    </style>
    <body>
    <?php 
            require_once("nav.inc.php");

            $sql = "SELECT * FROM cart WHERE c_id = '".$_SESSION['userId']."'";
            $result = mysqli_query($mysqli,$sql) or die ("Error in sql : $sql".mysqli_error($mysqli));
            $row = mysqli_fetch_array($result)
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
        <br>    
        <div class="container">
            <div class="bg-light py-5 px-5 text-center rounded rounded-2">
        <div class="row">
       <div class="col-2">     
       </div>
       <section class="" style="background-color:white">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col">
        <p><span class="h2">Shopping Cart </span><span class="h4">(มีสินค้า <?php echo $_SESSION['cart']?> ชิ้นในตะกร้า)</span></p>
        <?php 
        $sql_join = "SELECT * FROM cart INNER JOIN product ON cart.p_id = product.p_id WHERE cart.c_id = '$_SESSION[userId]'";
        $result_join = $mysqli->query($sql_join);
        $num_rows = $result_join->num_rows;
        if($result_join->num_rows > 0){
            $i = 1;
            $total_quantity = 0;
            $total_price = 0;
            $all_price = 0;
            foreach($result_join as $item){
        ?>
        <div class="card mb-4" style="background-color:darkgray;">
          <div class="card-body p-4">
            <div class="row align-items-center">
              <div class="col-md-2">
                <img src="../admin/uploads/product_img/<?php echo $item['p_img'];?>"
                  class="img-fluid" alt="Generic placeholder image">
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small mb-4 pb-2">ชื่อสินค้า</p>
                  <p class="lead fw-normal mb-0"><?php echo $item['p_name'];?></p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small mb-4 pb-2">ขนาดสินค้า</p>
                  <p class="lead fw-normal mb-0"><i class="fas fa-circle me-2" style="color: #fdd8d2;"></i>
                    <?php echo $item['p_size'];?></p>
                </div>
              </div>
              <div class="col-md-1 d-flex justify-content-center">
                <div>
                  <p class="small mb-4 pb-2">จำนวนสินค้า</p>
                  <p class="lead fw-normal mb-0"><input type="number" class="form-control" value="<?php echo $item['p_quantity'];?>" min="1" data-product-id="<?php echo $item['p_id'];?>"></td></p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small mb-4 pb-2">ราคา</p>
                  <p class="lead fw-normal mb-0"><?php echo $item['p_price'];?></p>
                </div>
              </div>
              <?php 
                          $total_price = $item['p_price'] * $item['p_quantity'];
                          $total_quantity += $item['p_quantity'];
                          $all_price += $total_price;
              ?>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small mb-4 pb-2">ราคารวม</p>
                  <p class="lead fw-normal mb-0"><?php echo number_format($total_price,2);?></p>
                </div>
              </div>
              
              <div class="col-md-1 d-flex justify-content-center">
                <div>
                  <p class="lead fw-normal mb-0"><a class="btn btn-danger" href="cart.del.php?id=<?php echo $item['p_id'];?>">
                    X
                </a></p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php 
        }
        ?>
        
        <div class="card mb-5">
          <div class="card-body p-4">
            <div class="float-end">
              <p class="mb-0 me-5 d-flex align-items-center">
                <span class="small text-muted me-2">ราคาทั้งหมด :</span> <span
                  class="lead fw-normal"><?php echo number_format($all_price,2);?></span>
              </p>
            </div>

          </div>
        </div>
        <div class="d-flex justify-content-end">
          <a href="product.php" class="btn btn-outline-secondary btn-lg me-2">กลับสู่หน้าสินค้า</a>
          <a href="checkout.php" class="btn btn-primary btn-lg">ชำระสินค้า</a>
        </div>
      </div>
    </div>
</section>
        <div class="col-2">
        </div>
       </div>
            <?php 
        }else{
            ?><br>
            <div class="text-empty-cart" align="center"><h3><b><br>ไม่มีสินค้าในตระกร้า</b></h3></div><br><br><br><br><br><br><br><br><br><br><br><br>
                <?php 
            }
            ?>
        </div>
        </div>
        </section>
        <!-- Footer-->
        <br>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="js/scripts.js"></script>
    </body>
</html>

<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    // Wait for the document to be ready
    $(document).ready(function() {
        // Attach a change event listener to the input field
        $('input.form-control').on('change', function() {
            // Get the product ID and new quantity
            var productId = $(this).data('product-id');
            var newQuantity = $(this).val();

            // Send an asynchronous request to update the quantity
            $.ajax({
                url: 'cart.update.php', // Replace with the actual server-side script
                method: 'POST',
                data: { productId: productId, newQuantity: newQuantity },
                success: function(response) {
                    // Handle the response if needed
                    console.log(response);
                    location.reload();
                },
                error: function(error) {
                    // Handle errors if needed
                    console.error(error);
                }
            });
        });
    });
</script>
<?php 
    }
?>