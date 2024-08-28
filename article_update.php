<?php
session_start();

require_once(__DIR__ . '/isConnect.php');
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');

$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo('An article ID is required to update it.');
    return;
}

$retrieveArticleStatement = $mysqlClient->prepare('SELECT * FROM article WHERE article_id = :id');
$retrieveArticleStatement->execute([
    'id' => (int)$getData['id'],
]);
$article = $retrieveArticleStatement->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DevNavigator - Find all about programming languages">
    <meta name="author" content="Clément Defer">
    <title>Update an article - DevNavigator</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/dev-navigator-style.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <main>
        <?php require_once(__DIR__ . '/header.php'); ?>
        <br><br><br><br><br><br>
        <div class="col-lg-8 col-12 mx-auto">
            <h2 class="text-white mb-5 fs-0 text-center">Update Article: <?php echo htmlspecialchars($article['title']); ?></h2>
            <div class="shadow-lg mt-5">
                <form class="custom-form contact-form mb-5 mb-lg-0" action="article_post_update.php" method="POST" role="form">
                    <div class="contact-form-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Choose a catchy title!" value="<?php echo htmlspecialchars($article['title']); ?>" required>
                            </div>
                        </div>
                        <textarea name="content" rows="6" class="form-control" id="content" placeholder="Write your article here..." required><?php echo htmlspecialchars($article['content']); ?></textarea>
                        <div class="mb-3 visually-hidden">
                            <label for="id" class="form-label">Article's ID</label>
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $getData['id']; ?>">
                        </div>
                        <div class="col-lg-4 col-md-10 col-8 mx-auto">
                            <button type="submit" class="form-control">Update Article</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>