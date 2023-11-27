<?php
// Check if there is a remembered username and set it as the default value for the input field
$rememberedUsername = isset($_COOKIE['rememberedUsername']) ? $_COOKIE['rememberedUsername'] : '';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel = "stylesheet">
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
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
            .navbar-nav{
                font-size: 25px;
                padding: 10px 15px;
            }

            .navbar-toggler {
                border: none;
                outline: none;
            }
            .navbar-button{
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
                background-color:#f0f5f3 ;
                width: 400px;
            }
            .search-form button {
                background-color:#c8ddd2 ;
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
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="signupp.php">
                    <img src="https://img.freepik.com/premium-vector/movie-maker-studio-vintage-logo_39679-141.jpg?w=740" alt="Logo" width="80" height="80">
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
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="color: black;"><i class="fas fa-th-list"></i> Genre</a>
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
                    <h1 class="card-title text-center"><b><i class="fas fa-sign-in-alt"></i> LOGIN PAGE</b></h1>
                    <hr>
                    <form action="dologin.php" method="post">
                        <fieldset>
                            <legend>
                                <label class="required"></label>
                                <div class="text-center">
                                    <h5><b>Welcome Back To Our Website!</b></h5>
                                </div>
                            </legend>
                            <br>
                            <div class="mb-3">
                                <label class="form-label required"><b><i class="fas fa-user"></i> Username:</b></label>
                                <input name="Username" type="text" required class="form-control" placeholder="Enter your Username" value="<?php echo $rememberedUsername; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required"><b><i class="fas fa-lock"></i> LockScreen Password:</b></label>
                                <input name="Password" type="password" required class="form-control" placeholder="Enter your Password">
                            </div>
                            <div class="form-check d-flex align-items-center mb-3">
                                <input name="check" type="checkbox" class="form-check-input" value="Remember Me">
                                <label class="form-check-label"></i> Remember Me</label>
                                <a href="forgetpassword.php" class="ms-auto"><i class="fas fa-key"></i> Forget Password</a>
                            </div>
                            <br/>
                            <div class="text-center">
                                <input type="submit" value="LOGIN" class="btn btn-primary">
                                <input type="reset" value="RESET" class="btn btn-secondary">
                            </div>
                        </fieldset>
                    </form>
                    <div class="text-center mt-3">
                        <h5>Don't have a member account yet?--><a href="signupp.php"></i> Sign Up</a></h5>
                        <h6>If you click on login button,but you are still in this page, means you entered wrong username or password</h6>
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
