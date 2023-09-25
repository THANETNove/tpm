<?php 
    require_once('dbcon.php');
    session_start();

    // Check if the form has been submitted
    if($_SERVER["REQUEST_METHOD"] == "POST")
    // Define your authentication logic here (e.g., check against a database)

    $inputUsername = $_POST['phonenum'];
    $inputPassword = $_POST['passwords'];

    // Query to fetch user data by username
    $sql = "SELECT * FROM customer WHERE c_phone = '$inputUsername'";
    $result = mysqli_query($mysqli, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row["passwords"];

        // Verify the password
        if (password_verify($inputPassword, $storedPassword)) {
            // Authentication successful
            $_SESSION["loggedin"] = true;
            $_SESSION["phonenum"] = $inputUsername;
            header("location: index.php");
            exit;
        } else {
            // Authentication failed
            $error = "Invalid username or password. Please try again.";
        }
    } else {
        // User not found
        $error = "User not found. Please try again.";
    }

?>