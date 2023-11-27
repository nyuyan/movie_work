<?php
session_start();
if (isset($_SESSION['name'])) {  //check name set
    session_destroy(); //clear
    $_SESSION = array();
}
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
        <div class="container d-flex justify-content-center align-items-center" style="height: 40vh;">
            <div class="text-center">
                <h3><b>Logout</b></h3>
                <p>You have successfully logged out. </p>
                <a href="loginn.php" class="btn btn-primary">Login</a>
            </div>
        </div>
    </body>
</html>
