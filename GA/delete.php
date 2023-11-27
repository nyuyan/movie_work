<?php
session_start();

if (!isset($_SESSION['name'])) { //check name set
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


$usern = $_SESSION['name'];
$query = "SELECT * FROM users WHERE username = '$usern'";
$result = mysqli_query($link, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($link));
}

if (mysqli_num_rows($result) > 0) {   //check user records exist
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $email = $row['email'];
    $name = $row['name'];
    $dob = $row['dob'];

//user delete
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
        $deleteQuery = "DELETE FROM users WHERE username = '$usern'";
        $deleteResult = mysqli_query($link, $deleteQuery);

        if (!$deleteResult) {
            die("Delete failed: " . mysqli_error($link));
        }


        if (mysqli_affected_rows($link) > 0) { //if can delete

            header("Location: signupp.php");
            exit();
        } else {

            $errorMessage = "Failed to delete user account";
        }
    }
} else {
    $errorMessage = "User not found";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Delete Account</title>
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

            .error-message {
                color: red;
                text-align: center;
                margin-bottom: 20px;
            }

            .delete-button {
                padding: 10px 20px;
                font-size: 20px;
                background-color: #f44336;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .delete-button:hover {
                background-color: #d32f2f;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Delete Account</h1>

            <?php if (isset($errorMessage)) { ?>
                <p class="error-message"><?php echo $errorMessage; ?></p>
            <?php } ?>

            <p>Are you sure you want to delete your account?</p>
            <div class="btn-container">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="submit" name="delete" value="Delete Account" class="delete-button">
                </form>
                <br>
                <a href="movie.php">Back to Movie Page</a>
            </div>
        </div>
    </body>
</html>
