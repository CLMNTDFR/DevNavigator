<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');

if (!isset($_SESSION['LOGGED_USER'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    return;
}

$articleId = $_POST['article_id'];
$isLiked = $_POST['is_liked'] === 'true';
$userId = $_SESSION['LOGGED_USER']['user_id'];

if ($isLiked) {
    // Remove like
    $removeLikeStatement = $mysqlClient->prepare('DELETE FROM likes WHERE article_id = :article_id AND user_id = :user_id');
    $removeLikeStatement->execute(['article_id' => $articleId, 'user_id' => $userId]);
} else {
    // Add like
    $addLikeStatement = $mysqlClient->prepare('INSERT INTO likes (article_id, user_id) VALUES (:article_id, :user_id)');
    $addLikeStatement->execute(['article_id' => $articleId, 'user_id' => $userId]);
}

// Fetch updated likes count
$likesCountStatement = $mysqlClient->prepare('SELECT COUNT(*) FROM likes WHERE article_id = :article_id');
$likesCountStatement->execute(['article_id' => $articleId]);
$likesCount = $likesCountStatement->fetchColumn();

echo json_encode(['success' => true, 'likesCount' => $likesCount]);
?>