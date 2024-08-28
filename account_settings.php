<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['LOGGED_USER'])) {
    header("Location: login.php");
    exit();
}

// Récupère les informations de l'utilisateur depuis la session
$user = $_SESSION['LOGGED_USER'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DevNavigator - A community of developers, by developers: explore technologies from code to production.">
    <meta name="author" content="Clément Defer">
    <title>DevNavigator - Account Settings</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/dev-navigator-style.css" rel="stylesheet">
</head>
<body>
    <!-- Include your header here -->
    <?php include('header.php'); ?>

    <main>
        <br><br><br><br><br>
        <section class="posts-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <article class="post-article">
                            <header class="mb-3">
                                <h5 class="mb-3">Account Settings</h5>
                            </header>
                            <div>
                                <p class="mb-3"><strong>Username:</strong> <?php echo htmlspecialchars($user['user_name']); ?></p>
                                <p class="mb-3"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                                <!-- Affichage du mot de passe sous forme masquée -->
                                <p class="mb-3"><strong>Password:</strong> <?php echo str_repeat('•', 12); ?></p>

                                <div class="btn-group">
                                    <a href="edit_account.php" class="btn btn-warning">Edit</a>
                                    <a href="logout.php" class="btn btn-danger">Logout</a>
                                </div>
                            </div>
                        </article>
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
