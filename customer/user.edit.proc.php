<?php

require_once('dbcon.php');
require_once('fn.php');
/*
$customerImg = $_FILES['customerImg'];
$customerName = $_POST['customerName'];
$customerGender = $_POST['customerGender'];
$customerAge = $_POST['customerAge'];
$customerAddr1 = $_POST['customerAddress1'];
$customerAddr2 = $_POST['customerAddress2'];
$customerAddr3 = $_POST['customerAddress3'];

$list = "<br>".$customerImg."<br>".$customerName."<br>".$customerGender."<br>".$customerAge."<br>".$customerAddr1."<br>".$customerAddr2."<br>".$customerAddr3;

echo $list;
*/
// Check if the form was submitted
    // Check if a file was uploaded{
    if (isset($_FILES["customerImg"])) {
        $uploadDir = "uploads/customer_img/"; // Directory to store uploaded images
        $uploadFile = $uploadDir . basename($_FILES["customerImg"]["name"]);

        // Check if the file is an image
        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $allowedExtensions)) {
            // Move the uploaded file to the server
            if (move_uploaded_file($_FILES["customerImg"]["tmp_name"], $uploadFile)) {
                  // Extract other details from the form
                  $customerName = $_POST["customerName"];
                  $customerAge = $_POST["customerAge"];
                  $customerGender = $_POST["customerGender"];
                  $customerTel = $_POST["customerTel"]; 
                  $customerAddr1 = $_POST["customerAddress1"];
                  $customerAddr2 = $_POST["customerAddress2"];
                  $customerAddr3 = $_POST["customerAddress3"];
                  $customerID = $_POST["customerID"];
                // Update image details into the database
                $customerImg = $_FILES["customerImg"]["name"];
                $sql = "UPDATE customer SET
                    c_name ='$customerName',
                    c_age ='$customerAge',
                    c_gender ='$customerGender',
                    c_tel ='$customerTel',
                    c_addr1 ='$customerAddr1',
                    c_addr2 ='$customerAddr2',
                    c_img ='$customerImg',
                    c_addr3 = '$customerAddr3'
                WHERE c_id = $customerID";
                if ($mysqli->query($sql) === TRUE) {
                    JAlert("บันทึกข้อมูลสำเร็จแล้ว");
                    header("Location:user_info.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $condb->error;
                }
                $condb->close();
            } else {
                echo "Failed to upload the image.";
            }
        } else {
            $customerName = $_POST["customerName"];
            $customerAge = $_POST["customerAge"];
            $customerGender = $_POST["customerGender"];
            $customerTel = $_POST["customerTel"]; 
            $customerAddr1 = $_POST["customerAddress1"];
            $customerAddr2 = $_POST["customerAddress2"];
            $customerAddr3 = $_POST["customerAddress3"];
            $customerID = $_POST["customerID"];

        $sql = "UPDATE customer SET 
            c_name ='$customerName',
                c_age ='$customerAge',
                c_gender ='$customerGender',
                c_tel ='$customerTel',
                c_addr1 ='$customerAddr1',
                c_addr2 ='$customerAddr2',
                c_addr3 = '$customerAddr3'
            WHERE c_id = $customerID";
       if ($mysqli->query($sql) === TRUE) {
        JAlert("บันทึกข้อมูลเรียบร้อย.");
            redirect("user_info.php");
    } else {
        echo "Error: " . $sql . "<br>" . $condb->error;
    }
        }
    } else {
        JAlert("ไม่มีข้อมูลสำหรับบันทึก.");
        //goBack();
    }
?>
