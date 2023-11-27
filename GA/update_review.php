<?php
//CHECK POST DATA SET
if (isset($_POST['reviewId'], $_POST['userId'], $_POST['review'], $_POST['rating'])) {
    //RETRIEVE DATA
    $reviewId = $_POST['reviewId'];
    $userId = $_POST['userId'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "graded assignment";
    $link = mysqli_connect($host, $username, $password, $database);

    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve user ID based on the provided username
    $sqlUserId = "SELECT userId FROM users WHERE username = '$userId'";
    $resultUserId = mysqli_query($link, $sqlUserId);
    if (mysqli_num_rows($resultUserId) > 0) {
        $rowUserId = mysqli_fetch_assoc($resultUserId);
        $userId = $rowUserId['userId'];

        // Update the review with the new values
        $sqlUpdate = "UPDATE reviews SET userId = '$userId', review = '$review', rating = '$rating' WHERE reviewId = '$reviewId'";
        if (mysqli_query($link, $sqlUpdate)) {
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; text-align: center;'>";
//RETRIEVE UPDATED REVIEW DETAIL
            $sqlReview = "SELECT r.*, u.username FROM reviews r INNER JOIN users u ON r.userId = u.userId WHERE reviewId = '$reviewId'";
            $resultReview = mysqli_query($link, $sqlReview);
            if (mysqli_num_rows($resultReview) > 0) {
                $rowReview = mysqli_fetch_assoc($resultReview);
                $updatedUsername = $rowReview['username'];
                $updatedReview = $rowReview['review'];
                $updatedRating = $rowReview['rating'];

                // Display the updated review information within the card-like container
                echo "<div class='container-fluid text-center' style='height: 100vh; display: flex; justify-content: center; align-items: center;'>";
                echo "<div class='card bg-light mb-3'>";
                echo "<div class='card-body'>";
                echo "<div style='background-color:#c2f0de; padding: 10px;'>";
                echo "<h3 style='font-weight: bold;'>Review Information Had Been Updated:</h3><br>";
                echo "<h4><strong>User:$updatedUsername</strong></h3>";
                echo "<h4><strong>Review: $updatedReview</strong></h3>";
                echo "<h4><strong>Rating:$updatedRating</strong></h3>";
                echo "</div>";
                echo "</div>";

                // Provide a link back to the review page
                echo "<br><a href='review.php'>Go back to your review page</a>";
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
                echo "Error retrieving updated review information.";
            }
            echo "</div>";
        } else {
            echo "Error updating review: " . mysqli_error($link);
        }
    } else {
        echo "Error updating review: User with username '$userId' does not exist.";
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
