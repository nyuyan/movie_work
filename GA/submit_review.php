<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "graded assignment";
$link = mysqli_connect($host, $username, $password, $database);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {   //check form submit via POST
    $movieId = $_POST['movieId'];
    $userName = $_POST['userId'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];

    $checkUserQuery = "SELECT * FROM users WHERE userName = '$userName'"; //USER EXIST?
    $userResult = mysqli_query($link, $checkUserQuery);
    if (mysqli_num_rows($userResult) > 0) {
        $userRow = mysqli_fetch_assoc($userResult);
        $userId = $userRow['userId'];
//INSERT REVIEW IN DATABASE 
        $insertReviewQuery = "INSERT INTO reviews (movieId, userId, review, rating, datePosted) VALUES ('$movieId', '$userId', '$review', '$rating', NOW())";
        if (mysqli_query($link, $insertReviewQuery)) {
            echo "<h1><b>Review submitted successfully.</b></h1>";

            // FETCH the submitted review details for display
            $fetchReviewQuery = "SELECT r.*, m.movieTitle FROM reviews r INNER JOIN movies m ON r.movieId = m.movieId WHERE r.userId = '$userId' AND r.movieId = '$movieId' ORDER BY r.datePosted DESC LIMIT 1";
            $reviewResult = mysqli_query($link, $fetchReviewQuery);
            $review = mysqli_fetch_assoc($reviewResult);

            if ($review) {
                echo "
                <div class='container'>
                    <div class='card'>
                        <h3>Review Details</h3>
                        <p><strong>Movie:</strong> {$review['movieTitle']}</p>
                        <p><strong>User:</strong> $userName</p>
                        <p><strong>Review:</strong> {$review['review']}</p>
                        <p><strong>Rating:</strong> {$review['rating']}</p>
                        <p><strong>Date Posted:</strong> {$review['datePosted']}</p>
                        <p><a href='review.php'>Go back to your review page</a></p>
                    </div>
                </div>";
            } else {
                echo "No review found.";
            }
        } else {
            echo "Error: " . mysqli_error($link);
        }
    } else {
        echo "User does not exist. Please enter a valid user ID.";
    }
}

mysqli_close($link);
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 80vh;
                max-width: 100%;
                background-color:#d5dff4;
            }

            .card {
                max-width: 600px; /* Adjust the card width as needed */
                padding: 50px; /* Adjust the card padding as needed */
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                background-color: #c2f0de;
            }

            .card p {
                font-size: 25px; /* Adjust the font size as needed */
                margin-bottom: 15px; /* Adjust the spacing between paragraphs as needed */
            }
        </style>
    </head>
    <body>
        <footer class="text-center">
            <p>&copy; 2023 Movie Review Website. All rights reserved.</p>
            <div class="background-box">
                <p>Follow us on social media</p>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </footer>
    </body>
</html>
