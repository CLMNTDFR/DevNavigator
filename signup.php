<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DevNavigator - Sign Up">
    <meta name="author" content="Clément Defer">
    <title>Sign Up - DevNavigator</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/dev-navigator-style.css" rel="stylesheet">
</head>
<body>
    <main>
        <?php require_once(__DIR__ . '/header.php'); ?>
        <br><br><br><br><br>
        <section class="contact-section section-padding" id="signup-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <h2 class="text-white mb-5 fs-0 text-center">Sign Up</h2>
                        <div class="shadow-lg mt-5">
                            <form class="custom-form contact-form mb-5 mb-lg-0" action="signup_validation.php" method="POST" role="form">
                                <div class="contact-form-body">
                                    <!-- Display error message if present -->
                                    <?php if (isset($_SESSION['SIGNUP_ERROR_MESSAGE'])) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $_SESSION['SIGNUP_ERROR_MESSAGE'];
                                            unset($_SESSION['SIGNUP_ERROR_MESSAGE']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <!-- Display success message if present -->
                                    <?php if (isset($_SESSION['SIGNUP_SUCCESS_MESSAGE'])) : ?>
                                        <div class="alert alert-success" role="alert">
                                            <?php echo $_SESSION['SIGNUP_SUCCESS_MESSAGE'];
                                            unset($_SESSION['SIGNUP_SUCCESS_MESSAGE']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="text" name="user_name" id="user_name"
                                                class="form-control" placeholder="User Name" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="email" name="email" id="email"
                                                class="form-control" placeholder="Email address" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="password" name="password" id="password"
                                                class="form-control" placeholder="Password" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="number" name="age" id="age"
                                                class="form-control" placeholder="Age" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-10 col-8 mx-auto mt-4">
                                        <button type="submit" class="form-control">Sign Up</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <div class="text-center mt-3">
                                <p class="text-white">Already have an account? <a href="login.php">Log In!</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
