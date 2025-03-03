<?php
require_once "../db/db-comments.php";

if (!empty($_POST["username"]) && !empty($_POST["content"]) && !empty($_POST["articleId"])) {
    $username = $_POST["username"];
    $content = $_POST["content"];
    $articleId = $_POST["articleId"];

    if (createComment($username, $content, $articleId)) {
        header("Location: #section-comments");
        exit();
    } else {
        include_once "../components/article-not-found.php";
    }
}

$comments = getComments($_GET["id"]);
?>

<?php if (!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>
        <div class="article-comment flex flex-column">
            <div class="flex flex-row justify-between flex-wrap">
                <p><strong><?php echo htmlspecialchars($comment['username']); ?></strong></p>
                <p class="p-min"><?php echo date("d-m-Y - H:i:s", strtotime($comment["created_at"])) ?></p>
            </div>
            <p><?php echo htmlspecialchars($comment['content']); ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="flex flex-column align-item-center gap-10">
        <img class="no-more" src="/assets/images/no-more.gif" alt="No More Article">
        <p class="p-grey">Il n'y a pas de commentaire pour l'instant...</p>
    </div>
<?php endif; ?>