<?php

require_once('dbcon.php');
require_once('fn.php');
// Retrieve form data
$username = $_POST["phonenumber"];
$name = $_POST["name"];
$password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash the password for security

// Check if the username or email already exists in the database
$check_sql = "SELECT * FROM customer WHERE c_pnum = ?";
$check_stmt = $mysqli->prepare($check_sql);
$check_stmt->bind_param("s", $username);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows > 0) {
    // User already exists
    JAlert("Phone Number has been sign up");
    redirect('register.php');
} else {
// Insert user data into the "users" table
$ins_sql = "INSERT INTO customer (c_pnum, c_name, c_pass) VALUES (?, ?, ?)";
$ins_stmt = $mysqli->prepare($ins_sql);
$ins_stmt->bind_param("sss", $username, $name, $password);

if ($ins_stmt->execute()) {
    echo "<br> Registration successful!";
    redirect('user_info.php');
} else {
    echo "Error: " . $mysqli->error;
}
}

// Close the database connection
$check_stmt->close();
$ins_stmt->close();
$mysqli->close();
?>