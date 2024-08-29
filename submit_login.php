<?php

session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

$postData = $_POST;

// Form Validation
if (isset($postData['email']) && isset($postData['password'])) {
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'A valid email is required to submit the form.';
    } else {
        // Retrieve the user corresponding to the email
        $stmt = $mysqlClient->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->bindParam(':email', $postData['email']);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Password verification
        if ($user && password_verify($postData['password'], $user['password'])) {
            // Correct password
            $_SESSION['LOGGED_USER'] = [
                'user_name' => $user['user_name'],
                'email' => $user['email'],
                'user_id' => $user['user_id'],
            ];
        } else {
            // Incorrect password or user not found
            $_SESSION['LOGIN_ERROR_MESSAGE'] = sprintf(
                'The information sent does not allow you to be identified: (%s/%s)',
                htmlspecialchars($postData['email']),
                strip_tags($postData['password'])
            );
        }
    }
} else {
    $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Both email and password are required.';
}

// Redirection to login page or home if user is logged in
if (isset($_SESSION['LOGGED_USER'])) {
    header('Location: index.php');
} else {
    header('Location: login.php');
}

exit(); // End script after redirection

