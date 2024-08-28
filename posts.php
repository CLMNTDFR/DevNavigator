<?php
session_start(); // Ensure session_start() is called at the beginning of this file
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

// Fetch articles from the database
$retrieveArticlesStatement = $mysqlClient->prepare('SELECT * FROM article ORDER BY date_creation DESC');
$retrieveArticlesStatement->execute();
$articles = $retrieveArticlesStatement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DevNavigator - Find all about programming languages">
    <meta name="author" content="Clément Defer">
    <title>Articles - DevNavigator</title>
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
                    <!-- Article content -->
                    <div class="col-lg-12 col-12">
                        <?php foreach ($articles as $article) : ?>
                            <article class="post-article" data-article-id="<?php echo $article['article_id']; ?>">
                                <header class="mb-3">
                                    <div class="d-flex align-items-baseline mb-2">
                                        <h5 class="mb-0 me-3"><?php echo htmlspecialchars(displayAuthor($article['author_id'], $users)); ?></h5>
                                        <h6 class="mb-0"><?php echo htmlspecialchars($article['title']); ?></h6>
                                    </div>
                                </header>
                                <div>
                                    <p><?php echo nl2br(htmlspecialchars(substr($article['content'], 0, 300))) . '...'; ?><a href="article_read.php?id=<?php echo $article['article_id']; ?>">Read More</a></p>
                                    
                                    <small class="text-muted">> <?php echo htmlspecialchars($article['date_creation']); ?></small>
                                    <br><br>
                                    <?php
                                    // Fetch likes count and user like status
                                    $likesCountStatement = $mysqlClient->prepare('SELECT COUNT(*) FROM likes WHERE article_id = :article_id');
                                    $likesCountStatement->execute(['article_id' => $article['article_id']]);
                                    $likesCount = $likesCountStatement->fetchColumn();

                                    $userLikedStatement = $mysqlClient->prepare('SELECT COUNT(*) FROM likes WHERE article_id = :article_id AND user_id = :user_id');
                                    $userLikedStatement->execute(['article_id' => $article['article_id'], 'user_id' => $_SESSION['LOGGED_USER']['user_id']]);
                                    $userLiked = $userLikedStatement->fetchColumn() > 0;
                                    ?>
                                    <span>
                                        <i class="bi bi-heart<?php echo $userLiked ? '-fill' : ''; ?> text-<?php echo $userLiked ? 'danger' : 'muted'; ?>"></i>
                                        <span class="text-muted"><?php echo $likesCount; ?></span>
                                    </span>
                                </div>
                                <?php if (isset($_SESSION['LOGGED_USER']) && $article['author_id'] === $_SESSION['LOGGED_USER']['user_id']) : ?>
                                    <br>
                                    <div class="btn-group" role="group" aria-label="Article actions">
                                        <a class="btn btn-warning" href="article_update.php?id=<?php echo($article['article_id']); ?>">Edit article</a>
                                        <a class="btn btn-danger" href="article_delete.php?id=<?php echo($article['article_id']); ?>">Delete article</a>
                                    </div>
                                <?php endif; ?>
                            </article>
                        <?php endforeach; ?>
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