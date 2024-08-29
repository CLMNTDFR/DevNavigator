<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

// Check if the user is logged in
if (!isset($_SESSION['LOGGED_USER'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['LOGGED_USER']['user_id'];

// Retrieving form data
$userName = $_POST['user_name'];
$email = $_POST['email'];
$age = isset($_POST['age']) ? (int)$_POST['age'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Data validation
if (empty($userName) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || ($age !== null && $age < 0)) {
    header("Location: edit_account.php?error=Invalid input");
    exit();
}

try {
    $updateUserQuery = 'UPDATE users SET user_name = :user_name, email = :email';
    
    if (!empty($password)) {
        // If a new password is provided, hash it and add it to the query
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $updateUserQuery .= ', password = :password';
    }
    
    $updateUserQuery .= ' WHERE user_id = :user_id';

    $stmt = $mysqlClient->prepare($updateUserQuery);
    
    // Bind the parameters
    $params = [
        'user_name' => $userName,
        'email' => $email,
        'user_id' => $userId
    ];

    if (!empty($password)) {
        $params['password'] = $hashedPassword;
    }

    $stmt->execute($params);

    // Update the information in the session
    $_SESSION['LOGGED_USER'] = [
        'user_id' => $userId,
        'user_name' => $userName,
        'email' => $email,
        'age' => $age
    ];

    header("Location: account_settings.php?success=Account updated successfully");
    exit();
} catch (Exception $e) {
    // Error handling
    header("Location: edit_account.php?error=" . urlencode($e->getMessage()));
    exit();
}
