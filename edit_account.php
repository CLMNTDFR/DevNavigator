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
    <title>DevNavigator - Edit Account</title>
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
                        <!-- Display messages -->
                        <?php if (isset($_GET['success'])): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo htmlspecialchars($_GET['success']); ?>
                            </div>
                        <?php elseif (isset($_GET['error'])): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo htmlspecialchars($_GET['error']); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Title and Form -->
                        <article class="post-article">
                            <header class="mb-3">
                                <h5 class="mb-3">Edit Account</h5>
                            </header>
                            <div>
                                <form action="edit_account_validation.php" method="post">
                                    <div class="mb-3">
                                        <label for="user_name" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo htmlspecialchars($user['user_name']); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••••••">
                                    </div>
                                </form>
                                
                                <!-- Grouping buttons -->
                                <div class="btn-group">
                                    <form action="edit_account_validation.php" method="post" class="d-inline">
                                        <button type="submit" class="btn btn-warning">Save changes</button>
                                    </form>
                                    <form action="delete_account.php" method="post" class="d-inline">
                                        <button type="submit" class="btn btn-danger">Delete Account</button>
                                    </form>
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
