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
    <meta name="description" content="DevNavigator - Find all about programming languages">
    <meta name="author" content="Clément Defer">
    <title>Log In - DevNavigator</title>
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
        
        <!-- Affichage des messages de succès ou d'échec -->
        <?php if (isset($_SESSION['SIGNUP_SUCCESS_MESSAGE'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['SIGNUP_SUCCESS_MESSAGE']; ?>
            </div>
            <?php unset($_SESSION['SIGNUP_SUCCESS_MESSAGE']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['SIGNUP_ERROR_MESSAGE'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['SIGNUP_ERROR_MESSAGE']; ?>
            </div>
            <?php unset($_SESSION['SIGNUP_ERROR_MESSAGE']); ?>
        <?php endif; ?>

        <!-- Le formulaire de login -->
        <?php require_once(__DIR__ . '/login_validation.php'); ?>
    </main>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
