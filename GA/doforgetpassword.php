<?php

$host = "localhost";
$username = "your_username";
$password = "your_password";
$database = "graded_assignment";
$link = mysqli_connect($host, $username, $password, $database);

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];  //get user input
    $newPassword = $_POST['new-password'];
    $sql = "UPDATE users SET password = '$newPassword' WHERE email = '$email'"; //construct
    if ($link->query($sql) === TRUE) { //execute
        $successMessage = "Your password has been successfully changed!";
    } else {
        $errorMessage = "Error updating password: " . $link->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <div class="container">

            <?php if (isset($successMessage)) { ?>
                <p class="success-message"><?php echo $successMessage; ?></p>
            <?php } ?>

            <?php if (isset($errorMessage)) { ?>
                <p class="error-message"><?php echo $errorMessage; ?></p>
            <?php } ?>

            <form action="reset_password.php" method="POST">
            </form>
        </div>
    </body>
</html>
s