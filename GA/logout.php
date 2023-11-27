<!DOCTYPE html>
<html>
    <head>
        <title>Logout Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
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
                border: none;
            }

            .navbar-toggler-icon {
                background: none;
            }
            .container {
                max-width: 700px;
                padding: 40px;
                margin-top: 100px;
                background-color: #c2f0de;
            }

            h1 {
                text-align: center;
                margin-bottom: 30px;
            }

            .text-center {
                text-align: center;
                font-size: 40px;
            }

            .btn-primary {
                background-color: #007bff;
            }
            .footer {
                text-align: center;
                margin-top: 230px;
                width: 100%;
            }
            .footer img {
                max-width: 100%;
                height: auto;
            }
            .search-form input[type="text"] {
                border: none;
                padding: 6px 12px;
                background-color: #f0f5f3;
                width: 400px;
            }

            .search-form button {
                background-color: #c8ddd2;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 5px;
            }
        </style>
    </head>
    <body>
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
                            <a class="nav-link" href="#" style="color: black;"><i class="fas fa-video"></i> Movies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: black;"><i class="fas fa-star"></i> Reviews</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               style="color: black;"><i class="fas fa-th-list"></i> Genre</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="movie.php" style="color: black;"><span style="color: red; font-weight: bold;">A</span>ction</a></li>
                                <li><a class="dropdown-item" href="movie.php" style="color: black;"><span style="color: red; font-weight: bold;">A</span>nimation</a></li>
                                <li><a class="dropdown-item" href="movie.php" style="color: black;"><span style="color: red; font-weight: bold;">A</span>dventure</a></li>
                                <li><a class="dropdown-item" href="movie.php" style="color: black;"><span style="color: red; font-weight: bold;">C</span>omedy</a></li>
                                <li><a class="dropdown-item" href="movie.php" style="color: black;"><span style="color: red; font-weight: bold;">D</span>rama</a></li>
                                <li><a class="dropdown-item" href="movie.php" style="color: black;"><span style="color: red; font-weight: bold;">F</span>antasy</a></li>
                                <li><a class="dropdown-item" href="movie.php" style="color: black;"><span style="color: red; font-weight: bold;">T</span>hriller</a></li>
                                <li><a class="dropdown-item" href="movie.php" style="color: black;"><span style="color: red; font-weight: bold;">R</span>omance</a></li>
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
                        <form class="nav-link" action="logout.php" method="POST">
                            <button type="submit" class="btn btn-link" name="logout">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <h1><b>Logout Page</b></h1>
            <p class="text-center">Are you sure you want to logout?</p>
            <div class="text-center">
                <a href="dologout.php" class="btn btn-primary">Logout</a>
                <a href="movie.php" class="btn btn-primary">Back</a>      
            </div>
        </div>
        <div class="footer">
            <p>&copy; Movies</p>
            <img src="https://i.pinimg.com/736x/c2/da/e7/c2dae7847c869ab0a0d7f1876cad65ba--filmstrip-hollywood-theme.jpg" alt="Footer Image">
        </div>
    </body>
</html>
