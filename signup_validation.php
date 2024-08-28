<?php

session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php'); // Ce fichier définit la connexion dans $mysqlClient
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

$postData = $_POST;

// Form Validation
if (
    isset($postData['user_name']) &&
    isset($postData['email']) &&
    isset($postData['password']) &&
    isset($postData['age'])
) {
    // Validation of email
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['SIGNUP_ERROR_MESSAGE'] = 'A valid email is required to submit the form.';
    } elseif (!is_numeric($postData['age']) || $postData['age'] <= 0) {
        $_SESSION['SIGNUP_ERROR_MESSAGE'] = 'A valid age is required.';
    } else {
        // Prepare and execute SQL insert
        try {
            $stmt = $mysqlClient->prepare('INSERT INTO users (user_name, email, password, age) VALUES (:user_name, :email, :password, :age)');
            $stmt->bindParam(':user_name', $postData['user_name']);
            $stmt->bindParam(':email', $postData['email']);
            $stmt->bindParam(':password', password_hash($postData['password'], PASSWORD_DEFAULT)); // Hashing the password
            $stmt->bindParam(':age', $postData['age']);
            $stmt->execute();

            $_SESSION['SIGNUP_SUCCESS_MESSAGE'] = 'Your account has been successfully created. You can now log in!';
            header('Location: login.php');
        } catch (Exception $e) {
            $_SESSION['SIGNUP_ERROR_MESSAGE'] = 'An error occurred while creating your account: ' . $e->getMessage();
            header('Location: signup.php');
        }
    }
} else {
    $_SESSION['SIGNUP_ERROR_MESSAGE'] = 'All fields are required.';
    header('Location: signup.php');
}

exit(); // End script after redirection
