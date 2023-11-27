<?php
session_start();

if (!isset($_SESSION['name'])) {
    header("Location: loginn.php");
    exit();
}

$username = $_SESSION['name'];

$host = "localhost";
$username = "root";
$password = "";
$database = "graded assignment";
$link = mysqli_connect($host, $username, $password, $database);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error()); //check
}

// Get the selected genre from the query string
$selectedGenre = isset($_GET['genre']) ? $_GET['genre'] : '';

if (isset($_GET['search'])) { //handle search function
    $searchQuery = $_GET['search'];

    // Prepare the SQL query to fetch movies that match the search query
    $sql = "SELECT * FROM movies WHERE movieTitle LIKE '%$searchQuery%'";
    if (!empty($selectedGenre)) {
        $sql .= " AND movieGenre LIKE '%$selectedGenre%'";
    }
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) { //check for match movie
        $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $movies = array();
    }
} else { //base on genre
    if (!empty($selectedGenre)) {
        $sql = "SELECT * FROM movies WHERE movieGenre LIKE '%$selectedGenre%'";
    } else {
        $sql = "SELECT * FROM movies";
    }
    $result = mysqli_query($link, $sql);

    // Check if there are any movie records in the database
    if (mysqli_num_rows($result) > 0) {
        $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $movies = array();
    }
}

// Close the database connection
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Movie Page</title>
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
                width: 300px; 
                border: none;
                padding: 6px 12px;
                background-color: #f0f5f3;
            }

            .search-form button {
                background-color: #c8ddd2;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 5px;
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
        <div class="background-box">
            <p><b><h5>"Welcome to MovieTube: Your Ultimate Movie Destination. Explore a diverse selection of films, ranging from intense action to touching dramas and animated treasures. Immerse in captivating tales, compelling characters, and breathtaking visuals. Experience the enchantment of movies that inspire and captivate."</h5></b></p>
        </div>
        <div class="container">
            <h1 class="text-center mt-4"><b>MOVIE LIST</b></h1>
            <div class="row justify-content-center">
                <?php
                if (count($movies) > 0) {
                    foreach ($movies as $movie) {
                        echo '<div class="col-md-4">';
                        echo '<div class="card">';
                        // Display the movie image
                        if (!empty($movie['picture'])) {
                            // Assuming the 'picture' column in the database stores the relative path to the images.
                            // Make sure the path is correct based on the location of your images folder.
                            echo '<img class="card-img-top custom-card-img" src="Images/' . $movie['picture'] . '" alt="' . $movie['movieTitle'] . ' Poster" title="' . $movie['movieTitle'] . '">';
                        } else {
                            // If the movie image is not available, use the placeholder image
                            echo '<img class="card-img-top custom-card-img" src="' . $placeholderImage . '" alt="Placeholder Image">';
                        }
                        // Display the movie title and genre
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $movie['movieTitle'] . '</h5>';
                        echo '<p class="card-text">' . $movie['movieGenre'] . '</p>';
                        // Display the "Details" link
                        echo '<a href="detail.php?id=' . $movie['movieId'] . '">Details</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-center">No movies found.</p>';
                }
                ?>
            </div>
        </div>
        <footer class="text-center">
            <p>&copy; 2023 Movie Review Website. All rights reserved.</p>
            <img src="https://i.pinimg.com/736x/c2/da/e7/c2dae7847c869ab0a0d7f1876cad65ba--filmstrip-hollywood-theme.jpg"
                 alt="Footer Image" class="footer-image">
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
