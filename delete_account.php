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

$userId = $_SESSION['LOGGED_USER']['user_id'];

try {
    // Prépare et exécute la requête pour supprimer l'utilisateur
    $stmt = $mysqlClient->prepare('DELETE FROM users WHERE user_id = :user_id');
    $stmt->execute(['user_id' => $userId]);

    // Déconnecte l'utilisateur
    session_destroy();
    header("Location: login.php?success=Account deleted successfully");
    exit();
} catch (Exception $e) {
    // Gestion des erreurs
    header("Location: edit_account.php?error=" . urlencode($e->getMessage()));
    exit();
}
