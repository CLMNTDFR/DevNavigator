<?php
if (!isset($_SESSION['LOGGED_USER'])) {
    return;
}

$articleId = isset($_GET['id']) ? (int)$_GET['id'] : null;

if (!$articleId) {
    echo 'Article ID is missing.';
    return;
}
?>

<div class="comment-form">
    <h4>Add a Comment</h4>
    <form action="comments_post_create.php" method="POST">
        <input type="hidden" name="article_id" value="<?php echo $articleId; ?>">
        <div class="mb-3">
            <label for="comment" class="text-white form-label">Your Comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>
</div>