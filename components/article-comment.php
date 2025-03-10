<?php
require_once __DIR__ . "/../pages/connection/init.php";
require_once "../db/db-comments.php";

$comments = getComments($_GET["id"]);
?>

<?php if (!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>
        <div class="article-comment flex flex-column gap-10">
            <div>
                <div class="flex flex-row justify-between flex-wrap">
                    <p><strong><?php echo htmlspecialchars($comment['username']); ?></strong></p>
                    <p class="p-min"><?php echo date("d-m-Y - H:i:s", strtotime($comment["created_at"])) ?></p>
                </div>
                <p><?php echo htmlspecialchars($comment['content']); ?></p>
            </div>

            <?php if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] === $comment["user_id"]): ?>
                <form action="../components/delete-comment.php" method="POST"
                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">
                    <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
                    <button type="submit" class="btn-danger">Supprimer</button>
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="flex flex-column align-item-center gap-10">
        <img class="no-more" src="/assets/images/no-more.gif" alt="No More Article">
        <p class="p-grey">Il n'y a pas de commentaire pour l'instant...</p>
    </div>
<?php endif; ?>