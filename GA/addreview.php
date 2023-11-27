<!DOCTYPE html>
<html>
    <head>
        <title>Reviews Page</title>
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
                border: none;
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
                width: 400px;
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

            textarea[name="reviewContent"] {
                border: none;
                padding: 6px 12px;
                background-color: #f0f5f3;
                width: 100%;
                height: 200px;
                resize: vertical;
            }

            input[name="rating"],
            input[name="username"] {
                border: none;
                padding: 6px 12px;
                background-color: #f0f5f3;
                width: 100%;
                box-sizing: border-box;
            }

            .form-label {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }

            .form-label i {
                margin-right: 10px;
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
                            <a class="nav-link" href="#" style="color: black;"><i class="fas fa-video"></i> Movies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: black;"><i class="fas fa-star"></i> Reviews</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               style="color: black;"><i class="fas fa-th-list"></i> Genre</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="Snacks.html" style="color: black;">Animation</a></li>
                                <li><a class="dropdown-item" href="frozen.html" style="color: black;">Drama</a></li>
                                <li><a class="dropdown-item" href="frozen.html" style="color: black;">Action</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="search-form">
                        <form action="#" method="GET">
                            <input type="text" name="search" placeholder="Search movies...">
                            <button type="submit">Search</button>
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
                </div>
            </div>
        </nav>
        <div class="centered">
            <h1 style="font-size: 45px;"><b>Add Review</b></h1>
        </div>
        <br/>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center"><b>Review</b></h2>
                    <form id="reviewForm" method="POST" action="process_review.php">
                        <div class="form-label">
                            <i class="fas fa-user"></i>
                            <label for="username">Username:</label>
                        </div>
                        <input type="text" name="username" id="username" placeholder="Username" required><br><br>
                        <div class="form-label">
                            <i class="fas fa-comment"></i>
                            <label for="reviewContent">Comment:</label>
                        </div>
                        <textarea name="reviewContent" id="reviewContent" placeholder="Enter your review" required></textarea><br><br>
                        <div class="form-label">
                            <i class="fas fa-star"></i>
                            <label for="rating">Rating (1-5):</label>
                        </div>
                        <input type="number" name="rating" id="rating" min="1" max="5" placeholder="Rating" required><br><br>
                        <div class="text-center">
                            <input type="submit" value="SUBMIT" class="btn btn-primary">
                            <input type="reset" value="RESET" class="btn btn-secondary">
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <h5>Click here to get back to the review page <i class="fas fa-arrow-right"></i><a href="review.php">REVIEW</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <p>copyrights &copy; Movies</p>
    </div>
    <div>
        <img src="https://i.pinimg.com/736x/c2/da/e7/c2dae7847c869ab0a0d7f1876cad65ba--filmstrip-hollywood-theme.jpg" alt="Footer Image" class="footer-image">
    </div>
</body>
</html>
