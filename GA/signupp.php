<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
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
                height: 350px;
                object-fit: fit;
            }

            .centered {
                text-align: center;
            }

            .search-form {
                margin-left: 180px;
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
                width: 100%;
                height: 80px;
                margin: 0 auto;
            }
            h6{
                font-size: 12px;
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
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title text-center"><b><i class="fas fa-user-plus"></i>SIGNUP PAGE</b></h1>
                    <hr>
                    <form action=dosignup.php method="post">
                        <fieldset>
                            <legend>
                                <label class="required"></label>
                                <div class="text-center">
                                    <h5><b>Have A Good Experience Ahead!</b></h5>
                                </div>
                            </legend>
                            <label class="required"><i class="fas fa-user"></i> Username</label>:
                            <input name="username" type="text" required placeholder="Enter your Username" autofocus
                                   size="20" maxlength="100"/>
                            <br/><br/>
                            <div><h6>Please enter your Phone LockScreen Password, so we can make sure this account is yours as we going to send you a message to your phone, this is for security.</h6></div>
                            <label class="required"><i class="fas fa-lock"></i> LockScreen Password</label>:
                            <input type="password" name="password" required placeholder="Enter your Password"/>
                            <br/><br/>
                            <label class="required"><i class="fas fa-phone"></i> Phone Number</label>:
                            <input type="number" name="integer" required placeholder="Enter your Number"/>
                            <br/><br/>
                            <label class="required"><i class="fas fa-user"></i> Name</label>:
                            <input name="name" type="text" required placeholder="Enter your Name" size="20" maxlength="100"/>
                            <br/><br/>
                            <label for="date"><i class="fas fa-birthday-cake"></i>Date of Birth:</label>
                            <input type="text" id="date" name="date" required>
                            <br/><br/>
                            <label class="required"><i class="fas fa-envelope"></i> Email Address</label>:
                            <input name="email" type="email" required placeholder="Enter your Email Address" size="20"
                                   maxlength="100"/>
                            <br/><br/>
                            <div class="text-center">
                                <input type="submit" value="SIGN UP" class="btn btn-primary">
                                <input type="reset" value="RESET" class="btn btn-secondary">
                            </div>
                        </fieldset>
                    </form>
                    <div class="text-center mt-3">
                        <h5>Already have an account? If yes, <a href="loginn.php">Login</a></h5>
                    </div>
                </div>
            </div>
        </div>
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