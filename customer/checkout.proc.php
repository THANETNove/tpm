<?php 
use PHPMailer\PHPMailer\PHPMailer;
require_once('dbcon.php');
require_once('fn.php');
require_once('PHPMailer/src/Exception.php');
require_once('PHPMailer/src/PHPMailer.php');
require_once('PHPMailer/src/SMTP.php');



$price = 0;
$total_price = 0;
$sum_price = 0;
$sum_weight = 0;



$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->CharSet = "UTF-8";
$mail->SMTPAuth = true;
$mail->Username = "";
$mail->Password = "";
$mail->Port = 587;
$mail->SMTPSecure = "tls";

/* $mail->Port = 465;
$mail->SMTPSecure = "ssl"; */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "555";
    // Check if a file was uploaded
    if (isset($_FILES["qrImg"])) {
        echo "666";
        $uploadDir = "../admin/uploads/order_img/"; // Directory to store uploaded images
        $uploadFile = $uploadDir . basename($_FILES["qrImg"]["name"]);

        // Check if the file is an image
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
   

        if (in_array($imageFileType, $allowedExtensions)) {

            echo "77";
            // Move the uploaded file to the server
            if (move_uploaded_file($_FILES["qrImg"]["tmp_name"], $uploadFile)) {
                echo "888";
                // Extract other details from the form
                $customerName = $_POST["customerName"];
                $customerEmail =   $_POST["customerEmail"];//
                $customerAddress = $_POST["address"];
                $productStatus = "อยู่ระหว่างตรวจสอบหลักฐานการชำระเงิน";
                $customerPay = $_POST["payPrice"];
                $productId = $_POST["productId"];
                $time = $_POST["datePurchase"];
                $ref = rand(100000000000001,999999999999999);
                $orderType = "การสั่งซื้อสินค้า";
  
                // Update image details into the database
                $qrImg = $_FILES["qrImg"]["name"];
                $sqlInsert = "INSERT INTO orders (c_id,c_name,c_mail,o_address,o_img,o_price,o_status,o_date,o_ref,o_type) VALUES ('".$_SESSION["userId"]."','$customerName','$customerEmail','$customerAddress','$qrImg','$customerPay','$productStatus','$time','$ref','$orderType')";
                $sqlDelete = "DELETE FROM cart WHERE c_id = '".$_SESSION['userId']."'";
                $sqlUpate = "UPDATE order_detail SET d_status = 'Ordered', o_date = '$time' WHERE d_status = 'Oncart' AND c_id = '".$_SESSION['userId']."'";

  
                    echo "999";

                if ($mysqli->query($sqlInsert) === TRUE and $mysqli->query($sqlDelete) === TRUE and $mysqli->query($sqlUpate) === TRUE) {
                    // Output
                    echo "10";

                    $od = "SELECT * FROM orders LEFT JOIN  order_detail ON orders.o_date = order_detail.o_date WHERE orders.o_date = ? AND orders.c_id = ?";
                    $sel_od = $mysqli->prepare($od);
                    $sel_od->bind_param("ss",$time,$_SESSION['userId']);
                    $sel_od->execute();
                    $get_od = $sel_od->get_result();
                    $row_od = $get_od->fetch_assoc();

                    $orderRef = $row_od['o_ref'];
                    $TPM = "Thai Technic Plas-Mach Co., Ltd.";
                   
                    $total_price = 0;
                    $sum_weight = 0;

                    $htmlContent = "
                    <div class='row d-flex justify-content-center align-items-center mb-3 mt-2'>
                        <div class='col-lg-10 col-xl-8'>
                            <div class='card' style='border-radius: 10px;'>
                                <div class='card-header px-4 py-4'>
                                    <h3 class='text-muted text-center'>ใบเสร็จรับเงิน</h3>
                                    <div class='row text-muted mt-3'>
                                        <div class='col-2'></div>
                                        <h6 class='col-5'>วันที่สั่งซื้อ : {$row_od['o_date']}</h6>
                                        <h6 class='col-5'>หมายเลขคำสั่งซื้อ : {$row_od['o_ref']}</h6>
                                    </div>
                                    <div class='row text-muted mt-3'>
                                        <div class='col-2'></div>
                                        <h6 class='col-5'>ชื่อ-สกุล : {$row_od['c_name']}</h6>
                                        <h6 class='col-5'>E-mail : {$row_od['c_mail']}</h6>
                                    </div>
                                </div>
                                <div class='card-body p-4'>
                                    <div class='d-flex justify-content-between align-items-center mb-4'>
                                        <div class='text-muted'>รายการสินค้าที่สั่งซื้อ</div>
                                    </div>
                                    <table class='table table-striped table-hover'>
                                        <thead class='table-dark'>
                                            <tr class='text-center'>
                                                <td width='30%'></td>
                                                <td width='25%'>ชื่อสินค้า</td>
                                                <td width='15%'>จำนวนสินค้า</td>
                                                <td width='15%'>ราคาสินค้า</td>
                                                <td width='15%'>ราคารวม</td>
                                            </tr>
                                        </thead>
                                        <tbody class='table-light'>";

                    while ($list = $get_od->fetch_assoc()) {
                        $price = $list['d_quantity'] * $list['p_price'];
                        $total_weight = ($list['d_quantity'] * $list['p_weight']) / 1000;
                        $total_price += $price;
                        $sum_weight += $total_weight;

                        $imagePath = '../Admin/uploads/product_img/' . $list['p_img'];
                        // ที่ใช้ได้ start path img
                       // $imagePath = "https://png.pngtree.com/thumb_back/fh260/background/20210903/pngtree-sunflower-summer-sunflower-flower-park-photography-picture-image_800070.jpg";
                        // end  path img
                        //$imagePath = "/Applications/XAMPP/xamppfiles/htdocs/project/tpm/Admin/uploads/product_img/page1/red_green6x14.webp";



                        $htmlContent .= "
                        <tr>
                            <td><img class='p-3' src='$imagePath' style='max-height: 200px;'></td>
                            <td>{$list['p_name']}</td>
                            <td class='text-center'>{$list['d_quantity']}</td>
                            <td class='text-end'>฿" . number_format($list['p_price'], 2) . "</td>
                            <td class='text-end'>฿" . number_format($price, 2) . "</td>
                        </tr>";
                    }

                    $htmlContent .= "
                                        </tbody>
                                    </table>
                                    <div class='d-flex justify-content-between mb-1 p-1'>
                                        <div class='text-muted'>ค่าจัดส่ง</div>
                                        <div class='text-muted'>฿50.00</div>
                                    </div>";

                    if ($sum_weight > 30) {
                        $htmlContent .= "
                                    <div class='d-flex justify-content-between mb-1 p-1' style='background-color:lightgray;'>
                                        <div>ส่วนลดค่าจัดส่ง</div>
                                        <div>-฿50.00</div>
                                    </div>";
                    }

                    $htmlContent .= "
                                    <div class='d-flex justify-content-between mb-1 p-1'>
                                        <div></div>
                                        <div class='text-muted'><strong>รวม ฿" . number_format($total_price, 2) . "</strong></div>
                                    </div>
                                    <div class='text-center text-muted'>
                                        ____________________________________________________________________________________________________________________________________________
                                    </div>
                                    <div class='mt-3'>
                                        <div class='text-center'>
                                            โปรดเก็บสำเนาใบเสร็จนี้ไว้อ้างอิง
                                        </div>
                                        <div class='text-center mt-2'>
                                            <a href='purchase.history.php'>ดูประวัติการสั่งซื้อทั้งหมด</a>
                                        </div>
                                        <div class='text-center mt-2 mb-3'>
                                            <a href='product.php'>ดูสินค้าอื่นๆ เพิ่มเติม</a>
                                        </div>
                                    </div>
                                    <div class='text-center text-muted'>
                                        ____________________________________________________________________________________________________________________________________________
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";

                    $mail->isHTML(true);
                    $mail->setFrom($customerEmail, $TPM);
                    $mail->addAddress($customerEmail);
                    $mail->Subject = "ใบสั่งซื้อสินค้าเลขที่ : " . $orderRef;
                    $mail->Body = $htmlContent;
                   

JAlert("สั่งซื้อเรียบร้อย");
$mail->send();
JAlert("send Email สำเร็จ");
#redirect("purchase.history.php");
} else {
echo "Error: " . $sql . "<br>" . $condb->error;
#goBack();
}
$mysqli->close();
} else {
echo "Failed to upload the image.";
#goBack();
}
}
}
}
?>