<?php
session_start();

require_once(__DIR__ . '/isConnect.php');
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');

/**
 * Form data validation
 */
$postData = $_POST;

if (
    empty($postData['title']) || empty($postData['content']) ||
    trim(strip_tags($postData['title'])) === '' || trim(strip_tags($postData['content'])) === ''
) {
    echo 'A title and content are required to submit the form.';
    return;
}

$title = trim(strip_tags($postData['title']));
$content = trim(strip_tags($postData['content']));

// Insert the article into the database
$insertArticle = $mysqlClient->prepare(
    'INSERT INTO article (title, content, author_id, date_creation) VALUES (:title, :content, :author_id, NOW())'
);
$insertArticle->execute([
    'title' => $title,
    'content' => $content,
    'author_id' => $_SESSION['LOGGED_USER']['user_id'], // Use the ID of the logged-in user
]);

// Fetch the last inserted article to get the article_id
$lastInsertId = $mysqlClient->lastInsertId();
$article = $mysqlClient->prepare('SELECT * FROM article WHERE article_id = :id');
$article->execute(['id' => $lastInsertId]);
$article = $article->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DevNavigator - Find all about programming languages">
    <meta name="author" content="Clément Defer">
    <title>Article Added - DevNavigator</title>
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
                        <article class="post-article">
                            <header class="mb-3">
                                <div class="d-flex align-items-baseline mb-2">
                                    <h4 class="mb-0">Article Added Successfully!</h4>
                                </div>
                                <div class="d-flex align-items-baseline mb-2">
                                    <h5 class="mb-0 me-3"><?php echo htmlspecialchars($_SESSION['LOGGED_USER']['user_name']); ?></h5>
                                    <h6 class="mb-0"><?php echo htmlspecialchars($title); ?></h6>
                                </div>
                            </header>
                            <div>
                                <p><?php echo nl2br(htmlspecialchars($content)); ?></p>
                            </div>
                            <?php if (isset($_SESSION['LOGGED_USER']) && $article['author_id'] === $_SESSION['LOGGED_USER']['user_id']) : ?>
                                <br>
                                <div class="btn-group" role="group" aria-label="Article actions">
                                    <a class="btn btn-warning" href="article_update.php?id=<?php echo($article['article_id']); ?>">Edit article</a>
                                    <a class="btn btn-danger" href="article_delete.php?id=<?php echo($article['article_id']); ?>">Delete article</a>
                                </div>
                            <?php endif; ?>
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