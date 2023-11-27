<?php
session_start();
//retrieve
$usern = $_POST['Username'];
$psw = $_POST['Password'];
$rememberMe = isset($_POST['check']) && $_POST['check'] === 'Remember Me';

$host = "localhost";
$username = "root";
$password = "";
$database = "graded assignment";
$link = mysqli_connect($host, $username, $password, $database);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM users WHERE username = '$usern' AND password = '$psw'";
$result = mysqli_query($link, $query); //execute query

if ($result && mysqli_num_rows($result) > 0) { //check
    $row = mysqli_fetch_assoc($result); //fetch
    $_SESSION['name'] = $row['username']; //store

    if ($rememberMe) {
        // Set a cookie to remember the username for one week (adjust the time as needed)
        setcookie('rememberedUsername', $row['username'], time() + (7 * 24 * 60 * 60));
    }

    header("Location: movie.php");
    exit();
} else {
    header("Location: loginn.php?error=Login Unsuccessful");
    exit();
}
?>
