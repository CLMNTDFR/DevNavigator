<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo('An article ID is required to view it.');
    return;
}

$articleId = (int)$getData['id'];

$retrieveArticleStatement = $mysqlClient->prepare('SELECT * FROM article WHERE article_id = :id');
$retrieveArticleStatement->execute([
    'id' => $articleId,
]);
$article = $retrieveArticleStatement->fetch(PDO::FETCH_ASSOC);

if (!$article) {
    echo 'Article not found.';
    return;
}

$retrieveCommentsStatement = $mysqlClient->prepare('SELECT * FROM comments WHERE article_id = :id ORDER BY date_creation ASC');
$retrieveCommentsStatement->execute([
    'id' => $articleId,
]);
$comments = $retrieveCommentsStatement->fetchAll(PDO::FETCH_ASSOC);

// Fetch likes count and user like status
$likesCountStatement = $mysqlClient->prepare('SELECT COUNT(*) FROM likes WHERE article_id = :article_id');
$likesCountStatement->execute(['article_id' => $articleId]);
$likesCount = $likesCountStatement->fetchColumn();

$userLikedStatement = $mysqlClient->prepare('SELECT COUNT(*) FROM likes WHERE article_id = :article_id AND user_id = :user_id');
$userLikedStatement->execute(['article_id' => $articleId, 'user_id' => $_SESSION['LOGGED_USER']['user_id']]);
$userLiked = $userLikedStatement->fetchColumn() > 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DevNavigator - Find all about programming languages">
    <meta name="author" content="Clément Defer">
    <title><?php echo htmlspecialchars($article['title']); ?> - DevNavigator</title>
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
        <section class="posts-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <article class="post-article" data-article-id="<?php echo $article['article_id']; ?>">
                            <header class="mb-3">
                                <div class="d-flex align-items-baseline mb-2">
                                    <h5 class="mb-0 me-3"><?php echo htmlspecialchars(displayAuthor($article['author_id'], $users)); ?></h5>
                                    <h6 class="mb-0"><?php echo htmlspecialchars($article['title']); ?></h6>
                                </div>
                            </header>
                            <div>
                                <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
                                <small class="text-muted">> <?php echo htmlspecialchars($article['date_creation']); ?></small>
                                <br><br>
                                <span>
                                    <i class="bi bi-heart<?php echo $userLiked ? '-fill' : ''; ?> text-<?php echo $userLiked ? 'danger' : 'muted'; ?>"></i>
                                    <span class="text-muted"><?php echo $likesCount; ?></span>
                                </span>
                            </div>
                        </article>
                        <hr>
                        <h4>Comments</h4>
                        <?php if (empty($comments)) : ?>
                            <p>No comment</p>
                        <?php else : ?>
                            <?php foreach ($comments as $comment) : ?>
                                <div class="comment">
                                    <p><?php echo nl2br(htmlspecialchars($comment['comment'])); ?></p>
                                    <small class="text-muted"><?php echo htmlspecialchars(displayAuthor($comment['user_id'], $users)); ?> • <?php echo htmlspecialchars($comment['date_creation']); ?></small>
                                    <hr>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                            <?php require_once(__DIR__ . '/comments_create.php'); ?>
                        <?php endif; ?>
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
    <script>
    $(document).ready(function() {
        $('.bi-heart').on('click', function() {
            var heartIcon = $(this);
            var articleId = heartIcon.closest('article').data('article-id');
            var isLiked = heartIcon.hasClass('bi-heart-fill');

            $.ajax({
                url: 'like_handler.php',
                type: 'POST',
                data: { article_id: articleId, is_liked: isLiked },
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.success) {
                        heartIcon.toggleClass('bi-heart bi-heart-fill');
                        heartIcon.toggleClass('text-muted text-danger');
                        heartIcon.next('span').text(result.likesCount);
                    }
                }
            });
        });
    });
    </script>
</body>
</html>