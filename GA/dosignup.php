<?php
$usern = $_POST['username'];
$psw = $_POST['password'];
$dob = $_POST['date'];
$email = $_POST['email'];
$name = $_POST['name'];

// Validate and sanitize the number input
$no = isset($_POST['number']) ? (int)$_POST['number'] : 0;

$host = "localhost";
$username = "root";
$password = "";
$database = "graded assignment";
$link = mysqli_connect($host, $username, $password, $database);

// Use prepared statements to prevent SQL injection
$query = "INSERT INTO users(username, password, name, dob, email, number)
          VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "sssssi", $usern, $psw, $name, $dob, $email, $no);

$status = mysqli_stmt_execute($stmt);

if ($status) {
    $message = "Username: " . $usern . "<br/>";
    $message .= "Name: " . $name . "<br/>";
    $message .= "Date of Birth: " . $dob . "<br/>";
    $message .= "Email: " . $email . "<br/>";
    $message .= "<b>Your account has been created successfully</b>";
    mysqli_close($link);
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Signup Successful</title>
            <style>
                body {
                    background-color: #d5dff4;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
                    margin: 0;
                    padding: 0;
                }

                .container {
                    text-align: center;
                    background-color: #ffffff;
                    padding: 20px;
                    border-radius: 5px;
                }

                .user-details {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    margin-top: 20px;
                }

                .footer {
                    position: fixed;
                    left: 0;
                    bottom: 0;
                    width: 100%;
                    background-color: #f8f8f8;
                    text-align: center;
                    padding: 10px 0;
                }
                h1{
                    font-size: 50px;
                }
                h4{
                    font-size: 25px;
                }
                p3{
                    font-size: 20px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1><b>Signup Successful!<b></h1>
                <div class="user-details">
                    <p3><h2><?php echo $message; ?></h2></p3>
                    <h4>Thank you for signing up. You can now proceed to <a href="loginn.php">login</a> with your new account.</h4>
                </div>
            </div>
            <div class="footer">
                <p1>copyrights &copy; Movies</p1>
            </div>
        </body>
    </html>
    <?php
    exit(); //terminate script
} else {
    $message = "Signup was not successful, please try again!";
    echo $message;
    mysqli_close($link);
}
?>
