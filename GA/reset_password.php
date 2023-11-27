<?php

// Retrieve form data
$email = $_POST['email'];
$newPassword = $_POST['new-password'];

$host = "localhost";
$username = "root";
$password = "";
$database = "graded assignment";
$link = mysqli_connect($host, $username, $password, $database);
// Check the connection
if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//execute the SQL update statement
$sql = "UPDATE users SET password = '$newPassword' WHERE email = '$email'";
//if success
if ($link->query($sql) === TRUE) {
    //message
    echo "<div class='container-fluid text-center' style='height: 100vh; display: flex; justify-content: center; align-items: center;'>";
    echo "<div class='card bg-light mb-3'>";
    echo "<div class='card-body'>";
    echo "<div style='background-color:#c2f0de; padding: 10px;'>";
    echo "<h1><b>Password updated successfully.</b></h1>";
    echo "<h2>If there is any error in changing password please contact us, if there is no error, an confirmation email had beem send to you.</b></h2>";
    echo "<p><a href='loginn.php'>Click here to get to login page</a></p>";
    echo "</div>";
} else {
    echo "Error updating password: " . $link->error;
}

// Close the database connection
$link->close();
?>

