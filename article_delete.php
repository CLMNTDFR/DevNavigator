<?php
session_start();

require_once(__DIR__ . '/isConnect.php');

$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo('An identifier is required to delete the article.');
    return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DevNavigator - Find all about programming languages">
    <meta name="author" content="Clément Defer">
    <title>Delete an article - DevNavigator</title>
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
        <br><br><br><br><br>
        <section class="posts-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <article class="post-article">
                            <header class="mb-3">
                                <h4 class="text-danger">Delete the article ?</h4>
                            </header>
                            <form action="article_post_delete.php" method="POST">
                                <div class="mb-3 visually-hidden">
                                    <label for="id" class="form-label">Article's ID</label>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $getData['id']; ?>">
                                </div>
                                <button type="submit" class="btn btn-danger">Deletion is permanent</button>
                            </form>
                            <br />
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