<?php
if (isset($_GET['reviewId'])) {  //check reviewID in Get
    $reviewId = $_GET['reviewId'];

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "graded assignment";
    $link = mysqli_connect($host, $username, $password, $database);

    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $fetchReviewQuery = "SELECT reviews.*, movies.movieTitle, users.name 
                         FROM reviews 
                         JOIN movies ON reviews.movieId = movies.movieId 
                         JOIN users ON reviews.userId = users.userId 
                         WHERE reviewId = $reviewId";
    $reviewResult = mysqli_query($link, $fetchReviewQuery);
    $review = mysqli_fetch_assoc($reviewResult);

    if (!$review) { //check if exist
        echo "Review not found.";
        exit();
    }

    if (isset($_POST['confirmDelete'])) { //review delete
        $deleteReviewQuery = "DELETE FROM reviews WHERE reviewId = $reviewId";
        $deleteResult = mysqli_query($link, $deleteReviewQuery);

        if ($deleteResult) {
            echo "Review deleted successfully.";
            header("Location: review.php");
            exit();
        } else {
            echo "Error deleting the review: " . mysqli_error($link);
        }
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Delete Review</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>

            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .card {
                max-width: 400px;
                padding: 20px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                background-color: #f7f7f7;
            }
            .card p {
                margin-bottom: 10px;
            }

            .card button {
                margin-top: 10px;
            }
        </style>
    </head>
    <body>


        <nav class="navbar navbar-expand-sm navbar-light">
        </nav>

        <div class="container">
            <div class="card">
                <?php
                $movieTitle = $review['movieTitle'];
                $userName = $review['name'];
                $reviewText = $review['review'];
                $rating = $review['rating'];
                $datePosted = $review['datePosted'];
                ?>
                <p><strong>Movie:</strong> <?php echo $movieTitle; ?></p>
                <p><strong>User:</strong> <?php echo $userName; ?></p>
                <p><strong>Review:</strong> <?php echo $reviewText; ?></p>
                <p><strong>Rating:</strong> <?php echo $rating; ?></p>
                <p><strong>Date Posted:</strong> <?php echo $datePosted; ?></p>

                <form method="POST">
                    <div class="mb-3">
                        <label for="confirmDelete">Are you sure you want to delete this review?</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="confirmDelete" name="confirmDelete" required>
                            <label class="form-check-label" for="confirmDelete">Yes, I confirm.</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Delete Review</button>
                    <button type="submit" class="btn btn-light"><a href="review.php">Back to Review Page</a></button>


                </form>
            </div>
    </body>
</html>
