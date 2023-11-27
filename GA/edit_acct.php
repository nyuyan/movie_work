<?php
session_start();


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


$usern = $_SESSION['name'];
$query = "SELECT * FROM users WHERE username = '$usern'";
$result = mysqli_query($link, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($link));
}

if (mysqli_num_rows($result) > 0) { //check userdata found
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $email = $row['email'];
    $name = $row['name'];
    $dob = $row['dob'];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check form submit
        $newUsername = $_POST['newUsername'];
        $newEmail = $_POST['newEmail'];
        $newName = $_POST['newName'];
        $newDOB = $_POST['newDOB'];

 
        $updateQuery = "UPDATE users SET username = '$newUsername', email = '$newEmail', name = '$newName', dob = '$newDOB' WHERE username = '$usern'";
        $updateResult = mysqli_query($link, $updateQuery);

        if (!$updateResult) {
            die("Update failed: " . mysqli_error($link));
        }

        if (mysqli_affected_rows($link) > 0) { //check row affected
            header("Location: profile_updated.php");
            exit();
        } else {
            $errorMessage = "Failed to update user information";
        }
    }
} else {
    $errorMessage = "User not found";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Profile</title>
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

            .card {
                width: 500px;
                height: auto;
                max-width: 90%;
                background-color: #c2f0de;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .card h1 {
                text-align: center;
                margin-bottom: 20px;
                font-size: 24px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-group label {
                display: block;
                font-weight: bold;
                font-size: 18px;
                margin-bottom: 5px;
            }

            .form-group input[type="text"],
            .form-group input[type="email"],
            .form-group input[type="date"] {
                width: 100%;
                padding: 8px;
                font-size: 16px;
                border-radius: 4px;
                border: 1px solid #ccc;
            }

            .form-group input[type="submit"] {
                width: auto;
                padding: 10px 20px;
                font-size: 18px;
                background-color: #4caf50;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .form-group input[type="submit"]:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <h1>Edit Profile</h1>

            <?php if (isset($errorMessage)) { ?>
                <p><?php echo $errorMessage; ?></p>
            <?php } ?>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="newUsername">New Username:</label>
                    <input type="text" id="newUsername" name="newUsername" value="<?php echo $username; ?>" required>
                </div>

                <div class="form-group">
                    <label for="newEmail">New Email:</label>
                    <input type="email" id="newEmail" name="newEmail" value="<?php echo isset($email) ? $email : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="newName">New Name:</label>
                    <input type="text" id="newName" name="newName" value="<?php echo isset($name) ? $name : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="newDOB">New Date of Birth:</label>
                    <input type="date" id="newDOB" name="newDOB" value="<?php echo isset($dob) ? $dob : ''; ?>" required>
                </div>

                <div class="form-group">
                    <input type="submit" value="Update">
                    <a href="movie.php"></i>Back to Movie Page</a></h5>
                </div>
            </form>
        </div>
    </body>
</html>
