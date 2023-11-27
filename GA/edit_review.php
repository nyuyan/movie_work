<?php
if (isset($_GET['reviewId'])) { //check reviewID In get
    $reviewId = $_GET['reviewId'];

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "graded assignment";
    $link = mysqli_connect($host, $username, $password, $database);

    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $userNames = array(); //store user IDs and names
    $sqlUsers = "SELECT userId, username FROM users"; //fetch
    $resultUsers = mysqli_query($link, $sqlUsers);
    if (mysqli_num_rows($resultUsers) > 0) { //pop usernames with fetch data
        while ($rowUsers = mysqli_fetch_assoc($resultUsers)) {
            $userNames[$rowUsers['userId']] = $rowUsers['username'];
        }
    }

    $sql = "SELECT * FROM reviews WHERE reviewId = $reviewId";//fetch reviewdate by reviewID
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) { //check if success
        $row = mysqli_fetch_assoc($result);
        $userId = $row['userId'];
        $review = $row['review'];
        $rating = $row['rating'];
        $userName = isset($userNames[$userId]) ? $userNames[$userId] : "Unknown"; //get username from array
        echo "<div class='container-fluid text-center' style='height: 100vh; display: flex; justify-content: center; align-items: center;'>";
        echo "<div class='card bg-light mb-3'>";
        echo "<div class='card-body'>";
        echo "<div style='background-color:#c2f0de; padding: 10px;'>";
        echo "<h4 class='card-title'>Edit Review:</h4>";
        echo "<form action='update_review.php' method='POST'>";
        echo "<input type='hidden' name='reviewId' value='$reviewId'>";
        echo "<input type='text' name='userId' value='$userName' required><br><br>";
        echo "<textarea name='review' required>$review</textarea><br><br>";
        echo "<input type='number' name='rating' value='$rating' min='1' max='5' required><br><br>";
        echo "<input type='submit' value='Update Review' class='btn btn-primary'>";
        echo "</form>";
        echo "</div>";
        echo "</div>";

        echo "<br><a href='review.php'>Click here to get back review page</a>";
        echo "<footer class='text-center'>";
        echo "<p>&copy; 2023 Movie Review Website. All rights reserved.</p>";
        echo "<img src='https://i.pinimg.com/736x/c2/da/e7/c2dae7847c869ab0a0d7f1876cad65ba--filmstrip-hollywood-theme.jpg' alt='Footer Image' class='footer-image'>";
        echo "<div class='background-box'>";
        echo "<p>Follow us on social media</p>";
        echo "<a href='#'><i class='fab fa-facebook-f'></i></a>";
        echo "<a href='#'><i class='fab fa-twitter'></i></a>";
        echo "<a href='#'><i class='fab fa-instagram'></i></a>";
        echo "<a href='#'><i class='fab fa-youtube'></i></a>";
        echo "</div>";
        echo "</footer>";
    } else {
        echo "<p>No review found with the provided review ID.</p>";
    }
    mysqli_close($link);
}
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
            body {
                background-color: #d5dff4;
                margin: 0;
                height: 100vh;
                align-items: center;
            }
        </style>
    </head>
</html>
<body>

</body>
</html>
