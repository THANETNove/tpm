<?php
require_once('dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $productId = $_POST["productId"];
   $newQuantity = $_POST["newQuantity"];

   // Update the quantity in the database
   $updateQuery = "UPDATE cart SET p_quantity = '$newQuantity' WHERE p_id = '$productId'";
   $result = mysqli_query($mysqli, $updateQuery);

   if ($result) {
      echo "Quantity updated successfully";
   } else {
      echo "Error updating quantity: " . mysqli_error($mysqli);
   }
}
?>
