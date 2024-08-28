<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

// Récupération des données du formulaire
$postData = $_POST;

// Validation des données reçues
if (
    !isset($postData['contact-email'])
    || !filter_var($postData['contact-email'], FILTER_VALIDATE_EMAIL)
    || empty($postData['contact-message'])
    || trim($postData['contact-message']) === ''
) {
    echo 'Valid email and message are required to submit the form.';
    return;
}

require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

// Secure data with htmlspecialchars
$fullName = htmlspecialchars($postData['contact-name']);
$email = htmlspecialchars($postData['contact-email']);
$company = !empty($postData['contact-company']) ? htmlspecialchars($postData['contact-company']) : null;
$message = htmlspecialchars($postData['contact-message']);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DevNavigator - Find all about programming languages">
    <meta name="author" content="Clément Defer">
    <title>Contact Confirmation - DevNavigator</title>
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
        <div class="container">
            <div class="col-12 mt-auto mb-5 text-center">
                <br><br>
                <h1 class="text-white mb-5 fs-3">Message received successfully!</h1>
            </div>
            <div class="col-12 mt-auto mb-5 text-center">
                <h2 class="text-white mb-5 fs-1">Reminder of your information</h2>
            </div>
            <div class="card text-white bg-dark mb-3" style="max-width: 36rem; margin: 0 auto;">
                <div class="card-body">
                    <p class="card-text"><b>Full Name</b>: <?php echo $fullName; ?></p>
                    <p class="card-text"><b>Email</b>: <?php echo $email; ?></p>

                    <?php if ($company): ?>
                        <p class="card-text"><b>Company</b>: <?php echo $company; ?></p>
                    <?php endif; ?>

                    <p class="card-text"><b>Message</b>: <?php echo $message; ?></p>
                </div>
            </div>
        </div>
        <br><br>
        <div class="col-12 mt-auto mb-5 text-center">

                        <a class="btn custom-btn smoothscroll" href="index.php">Back to home</a>
                    </div>
    </main>
</body>
</html>
