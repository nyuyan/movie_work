<?php
session_start();

if (!isset($_SESSION['name'])) { //check uername log in
    header("Location: loginn.php");
    exit();
}

$username = $_SESSION['name']; //get name

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$database = "graded assignment";
$link = mysqli_connect($host, $dbUsername, $dbPassword, $database);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$movies = []; //array store movie info

$sql = "SELECT * FROM movies";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    $movies = mysqli_fetch_all($result, MYSQLI_ASSOC); //fetch n store in array
}
function getReviewsForMovie($movieId, $link) { //get specific movie
    $reviews = [];

    $sql = "SELECT reviews.*, users.username FROM reviews INNER JOIN users ON reviews.userId = users.userId WHERE movieId = $movieId";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        $reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    return $reviews;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Review Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
            body {
                background-color: #d5dff4;
            }

            .navbar {
                margin-bottom: 30px;
                background-color: #c2f0de;
                padding: 15px;
            }

            .navbar-brand {
                font-size: 25px;
            }

            .navbar-nav {
                font-size: 25px;
                padding: 10px 15px;
            }

            .navbar-toggler {
                border: none;
                outline: none;
            }

            .navbar-button {
                font-size: 16px; 
                padding: 5px 10px; 
                border:none;
            }

            .navbar-toggler-icon {
                background: none;
            }

            .card {
                margin: 20px auto;
                max-width: 500px;
            }

            .card-img-top {
                height: auto;
                object-fit: contain;
            }

            .centered {
                text-align: center;
            }

            .search-form {
                margin-left: 60px;
                margin-right: 15px;
                align-items: center;
            }

            .search-form input[type="text"] {
                border: none;
                padding: 6px 12px;
                background-color: #f0f5f3;
                width: 300px;
            }

            .search-form button {
                background-color: #c8ddd2;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 5px;
            }

            .movie-container {
                display: flex;
                align-items: flex-start;
            }

            .movie-container .movie {
                display: flex;
                align-items: center;
                margin: 10px;
            }

            .movie-container .movie .card {
                margin-left: 20px;
                width: 100%;
            }

            .footer-image {
                min-width: 100%;
                height: 80px;
                margin: 0 auto;
            }

            .background-box {
                background-color: white;
                padding: 10px;
                margin: 20px 0;
            }
            .movie-details {
                height: 400px; 
                width: 100%;
                padding: 10px;
            }

            .review-content {
                display: none;
                margin-bottom: 20px;
            }

            :target .review-content {
                display: block;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="signupp.php">
                    <img src="https://img.freepik.com/premium-vector/movie-maker-studio-vintage-logo_39679-141.jpg?w=740"
                         alt="Logo" width="80" height="80">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="movie.php" style="color: black;"><i class="fas fa-video"></i> Movies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="review.php" style="color: black;"><i class="fas fa-star"></i> Reviews</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="genre.php" role="button" data-bs-toggle="dropdown"
                               style="color: black;"><i class="fas fa-th-list"></i>Genre</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item <?php echo $selectedGenre === 'Action' ? 'active' : ''; ?>"
                                       href="movie.php?genre=Action"
                                       style="color: black;"><span style="color: red; font-weight: bold;">A</span>ction</a></li>
                                <li><a class="dropdown-item <?php echo $selectedGenre === 'Adventure' ? 'active' : ''; ?>"
                                       href="movie.php?genre=Adventure"
                                       style="color: black;"><span style="color: red; font-weight: bold;">A</span>dventure</a>
                                </li>
                                <li><a class="dropdown-item <?php echo $selectedGenre === 'Animation' ? 'active' : ''; ?>"
                                       href="movie.php?genre=Animation"
                                       style="color: black;"><span style="color: red; font-weight: bold;">A</span>nimation</a>
                                </li>
                                <li><a class="dropdown-item <?php echo $selectedGenre === 'Drama' ? 'active' : ''; ?>"
                                       href="movie.php?genre=Drama"
                                       style="color: black;"><span style="color: red; font-weight: bold;">D</span>rama</a></li>
                                <li><a class="dropdown-item <?php echo $selectedGenre === 'Fantasy' ? 'active' : ''; ?>"
                                       href="movie.php?genre=Fantasy"
                                       style="color: black;"><span style="color: red; font-weight: bold;">F</span>antasy</a></li>
                                <li><a class="dropdown-item <?php echo $selectedGenre === 'Thriller' ? 'active' : ''; ?>"
                                       href="movie.php?genre=Thriller"
                                       style="color: black;"><span style="color: red; font-weight: bold;">T</span>hriller</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="profile.php" role="button" data-bs-toggle="dropdown" style="color: black;"><i class="fas fa-th-list"></i>Profile</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="edit_acct.php">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="forgetpassword.php">Change Password</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                <li><a class="dropdown-item" href="delete.php">Delete Account</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="search-form">
                        <form action="movie.php" method="GET">
                            <input type="text" name="search" placeholder="Search movies...">
                            <button type="submit"><i class="fas fa-search"></i>Search</button>
                        </form>
                    </div>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="loginn.php">
                                <button class="navbar-button"><i class="fas fa-user"></i> Login</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signupp.php">
                                <button class="navbar-button"><i class="fas fa-user-plus"></i> Signup</button>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-nav">
                        <?php if (isset($_SESSION['name'])) : ?>
                            <span class="nav-link welcome-message">Welcome,<?php echo $_SESSION['name']; ?></span>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </nav>
        <h3><b>Click on the number below if you want to go directly to the movie you want! :)</b></h3>
        <?php //display links each movie
        foreach ($movies as $movie) {
            $movieId = $movie['movieId'];
            $movieTitle = $movie['movieTitle'];
            echo "<a href='#movie$movieId'>$movieId($movieTitle)</a> | ";
        }
        ?></h5>
    <br/>
    <?php //loop through each movie display review
    foreach ($movies as $movie) {
        $movieId = $movie['movieId'];
        $movieTitle = $movie['movieTitle'];
        $imageUrl = "Images/" . $movie['picture'];
        $reviews = getReviewsForMovie($movieId, $link);
        ?>
        <div id="movie<?php echo $movieId; ?>" class="review-section"> 
            <div class="movie-container">
                <div class="movie"> 
                    <img src="<?php echo $imageUrl; ?>" alt="<?php echo $movieTitle; ?>" class="movie-image">
                </div>
                <div class="movie-details">
                    <h2><?php echo $movieTitle; ?></h2>
                    <?php if (!empty($reviews)) { ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Review</th>
                                    <th>Rating</th>
                                    <th>Date Posted</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reviews as $review) { ?>
                                    <tr>
                                        <td><?php echo $review['username']; ?></td>
                                        <td><?php echo $review['review']; ?></td>
                                        <td><?php echo $review['rating']; ?></td>
                                        <td><?php echo $review['datePosted']; ?></td>
                                        <td>
                                            <?php if ($review['username'] === $username) { ?>
                                                <a href="edit_review.php?reviewId=<?php echo $review['reviewId']; ?>">Edit</a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($review['username'] === $username) { ?>
                                                <a href="delete_review.php?reviewId=<?php echo $review['reviewId']; ?>">Delete</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <p>No reviews available for this movie.</p>
                    <?php } ?>
                    <div class="background-box">
                        <h4>Leave a Review:</h4>
                        <form action="submit_review.php" method="POST">
                            <input type="hidden" name="movieId" value="<?php echo $movieId; ?>"><br>
                            <label for="name">Name:</label><br>
                            <input type="text" name="userId" id="name" placeholder="Your Name" value="<?php echo $username; ?>" required><br><br>
                            <label for="comment">Comment:</label><br>
                            <textarea name="review" id="comment" placeholder="Enter your comment" required></textarea><br><br>
                            <label for="rating">Rating:</label><br>
                            <input type="number" name="rating" id="rating" placeholder="Rating (1-5)" min="1" max="5" required><br><br>
                            <input type="submit" value="Submit Review">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <footer class="text-center">
        <p>&copy; 2023 Movie Review Website. All rights reserved.</p>
        <img src="https://i.pinimg.com/736x/c2/da/e7/c2dae7847c869ab0a0d7f1876cad65ba--filmstrip-hollywood-theme.jpg" alt="Footer Image" class="footer-image">
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
