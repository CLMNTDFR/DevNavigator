<?php
session_start(); // Ensure session_start() is called at the beginning of this file
require_once(__DIR__ . '/isConnect.php');

if (!isset($_SESSION['LOGGED_USER'])) {
    // If the user is not logged in, redirect to login.php
    header('Location: login.php');
    exit(); // Make sure the script stops after the redirection
}

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
    <meta name="description" content="DevNavigator - Find all about programming languages">
    <meta name="author" content="Clément Defer">
    <title>Write an article - DevNavigator</title>
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
        <br><br><br><br><br><br>
        <div class="col-lg-8 col-12 mx-auto">
            <h2 class="text-white mb-5 fs-0 text-center">Write a New Article</h2>
            <div class="shadow-lg mt-5">
                <form class="custom-form contact-form mb-5 mb-lg-0" action="article_post_create.php" method="POST" role="form">
                    <div class="contact-form-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Choose a catchy title!" required>
                            </div>
                        </div>
                        <textarea name="content" rows="6" class="form-control" id="content" placeholder="Write your article here..." required></textarea>
                        <div class="col-lg-4 col-md-10 col-8 mx-auto">
                            <button type="submit" class="form-control">Publish the article</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
