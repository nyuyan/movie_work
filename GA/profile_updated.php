<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
    header("Location: loginn.php");
    exit();
}

$host = "localhost";
$username = "root";
$password = "";
$database = "graded assignment";
$link = mysqli_connect($host, $username, $password, $database);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the user's information from the database
$usern = $_SESSION['name'];
$query = "SELECT * FROM users WHERE username = '$usern'";
$result = mysqli_query($link, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($link));
}

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // User information retrieved, store it in variables
    $newUsername = $row['username'];
    $newEmail = $row['email'];
    $newName = $row['name'];
    $newDOB = $row['dob'];
} else {
    // User information not found, handle the error appropriately
    $errorMessage = "User not found";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profile Updated</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #d5dff4;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 400px;
                background-color: #c2f0de;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .container h1 {
                text-align: center;
                margin-bottom: 20px;
                font-size: 40px;
            }

            .user-info label {
                display: inline-block;
                width: 120px;
                font-weight: bold;
                font-size: 25px;
            }
            .btn-container {
                text-align: center;
                margin-top: 20px;
            }

            .btn-container a {
                display: inline-block;
                padding: 10px 20px;
                font-size: 20px;
                background-color: #4caf50;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
                margin: 5px;
            }

            .btn-container a:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>User Information</h1>
            <div class="user-info">
                <label for="username">Username:</label>
                <p id="username"><?php echo isset($newUsername) ? $newUsername : ''; ?></p>

                <label for="email">Email:</label>
                <p id="email"><?php echo isset($newEmail) ? $newEmail : ''; ?></p>

                <label for="name">Name:</label>
                <p id="name"><?php echo isset($newName) ? $newName : ''; ?></p>

                <label for="dob">Date of Birth:</label>
                <p id="dob"><?php echo isset($newDOB) ? $newDOB : ''; ?></p>
            </div>

            <div class="btn-container">
                <a href="loginn.php">Back to Login</a>
                <a href="edit_acct.php">Back to Edit</a>
            </div>
        </div>
    </body>
</html>


