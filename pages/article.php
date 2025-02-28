<?php
require_once "../db/db-article.php";
require_once "../db/db-comments.php";

$article = getArticleById($_GET["id"]);

if (isset($_POST["username"]) && isset($_POST["content"]) && isset($_POST["articleId"])) {
    $username = $_POST["username"];
    $content = $_POST["content"];
    $articleId = $_POST["articleId"];

    if (createComment($username, $content, $articleId)) {
        header("Location: #section-comments");
        exit();
    } else {
        include "../components/article-not-found.php";
    }
}

if (!$article) {
    include "../components/article-not-found.php";
}

$comments = getComments($_GET["id"]);
$pageTitle = $article["title"];
$title = "Konbinawak - $pageTitle";
include_once "../components/header.php";
?>

<main class="flex flex-column align-item-center gap-50">
    <section class="article-content flex flex-column gap-20">
        <div class="article-attribute flex flex-wrap justify-between gap-10">
            <p>Créer le <?= date("d-m-Y", strtotime($article["created_at"])) ?></p>
            <span class="article-tag <?= ($article["category_color"]) ?>">
                <p class="p-min"><?= ($article["category_name"] ?: "Non classé") ?></p>
            </span>
        </div>

        <div class="flex flex-column gap-10">
            <h1><?= ($article["title"]) ?></h1>
            <p class="p-grey"><?= ($article["description"]) ?></p>
        </div>
    </section>

    <section class="article-content flex flex-column">
        <img class="article-cover" src="<?= ($article["img_cover"] ?: "/assets/images/articles/cover-null.jpg") ?>"
            alt="<?= ($article["title"]) ?>">
    </section>

    <section class="article-content flex flex-column">
        <p><?= nl2br(($article["content"])) ?></p>
    </section>

    <section id="section-comments" class="article-content flex flex-column gap-50 mt-200">
        <h2>Commentaires</h2>
        <div class="flex flex-column gap-10">
            <?php require_once "../components/form-comment.php" ?>
            <?php if (!empty($comments)): ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="article-comment flex flex-column">
                        <div class="flex flex-row justify-between gap-10">
                            <p><strong><?= htmlspecialchars($comment['username']); ?></strong></p>
                            <p class="p-min"><?= date("d-m-Y - H:i:s", strtotime($comment["created_at"])) ?></p>
                        </div>
                        <p><?= htmlspecialchars($comment['content']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="flex flex-column align-item-center gap-10">
                    <img class="no-more" src="/assets/images/no-more.gif" alt="No More Article">
                    <p class="p-grey">Il n'y a pas de commentaire pour l'instant...</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
include_once "../components/footer.php";
?>