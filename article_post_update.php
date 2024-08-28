<?php
session_start();

require_once(__DIR__ . '/isConnect.php');
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');

$postData = $_POST;

if (
    !isset($postData['id'])
    || !is_numeric($postData['id'])
    || empty($postData['title'])
    || empty($postData['content'])
    || trim(strip_tags($postData['title'])) === ''
    || trim(strip_tags($postData['content'])) === ''
) {
    echo 'Some information is missing to allow form editing.';
    return;
}

$id = (int)$postData['id'];
$title = trim(strip_tags($postData['title']));
$content = trim(strip_tags($postData['content']));

$insertArticleStatement = $mysqlClient->prepare('UPDATE article SET title = :title, content = :content WHERE article_id = :id');
$insertArticleStatement->execute([
    'title' => $title,
    'content' => $content,
    'id' => $id,
]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DevNavigator - Find all about programming languages">
    <meta name="author" content="Clément Defer">
    <title>Article Updated - DevNavigator</title>
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
                                <h4 class="text-success">Article Updated</h4>
                            </header>
                            <p>The article has been successfully updated.</p>
                            <div class="d-flex align-items-baseline mb-2">
                                <h5 class="mb-0 me-3"><?php echo htmlspecialchars($_SESSION['LOGGED_USER']['user_name']); ?></h5>
                                <h6 class="mb-0"><?php echo htmlspecialchars($title); ?></h6>
                            </div>
                            <div>
                                <p><?php echo nl2br(htmlspecialchars($content)); ?></p>
                            </div>
                            <a href="posts.php" class="btn btn-primary">Back to Articles</a>
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

<?php
// Redirect to the posts page after a short delay to allow the user to see the confirmation message
header("refresh:20;url=posts.php");
?>