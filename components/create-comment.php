<?php
require_once __DIR__ . "/../pages/connection/init.php";
require_once __DIR__ . "/../db/db-comments.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["user_id"])) {
    $userId = $_SESSION["user_id"];
    $content = trim($_POST["content"]);
    $articleId = $_POST["articleId"];

    if (!empty($content) && !empty($articleId)) {
        if (createComment($articleId, $userId, $content)) {
            header("Location: article.php?id=" . $articleId . "#section-comments");
            exit();
        } else {
            $message = "<p class='error'>Une erreur est survenue, veuillez réessayer.</p>";
        }
    } else {
        $message = "<p class='error'>Le champ commentaire ne peut pas être vide.</p>";
    }
}
?>

<?php if (isset($_SESSION["user_id"])) : ?>
    <form class="flex flex-column gap-5" method="POST" action="">
        <input type="hidden" name="articleId" value="<?php echo $article["id"]; ?>">

        <p><strong><?php echo $_SESSION["username"]; ?></strong></p>

        <div class="flex flex-column gap-10">
            <div>
                <label for="content"></label>
                <textarea class="form-input" id="content" name="content" rows="4" placeholder="Votre commentaire..."
                    required></textarea>
            </div>
        </div>

        <?php echo "<p style='color: red; font-size:0.75rem;'> $message </p>" ?>


        <button type="submit" class="btn-primary">Envoyer</button>
    </form>
<?php else : ?>
    <div class="flex flex-column gap-10 align-item-left">
        <p>Connectez-vous pour laisser un commentaire.</p>
        <a href="/pages/connection/login.php" class="btn-primary">Login</a>
    </div>
<?php endif; ?>