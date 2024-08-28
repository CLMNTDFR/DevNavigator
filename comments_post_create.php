<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');

$postData = $_POST;

if (
    !isset($postData['article_id'])
    || !is_numeric($postData['article_id'])
    || empty($postData['comment'])
    || trim(strip_tags($postData['comment'])) === ''
) {
    echo 'Some information is missing to submit the comment.';
    return;
}

$articleId = (int)$postData['article_id'];
$comment = trim(strip_tags($postData['comment']));
$userId = $_SESSION['LOGGED_USER']['user_id'];

$insertCommentStatement = $mysqlClient->prepare('INSERT INTO comments (user_id, article_id, comment) VALUES (:user_id, :article_id, :comment)');
$insertCommentStatement->execute([
    'user_id' => $userId,
    'article_id' => $articleId,
    'comment' => $comment,
]);

header('Location: article_read.php?id=' . $articleId);
exit();
?>