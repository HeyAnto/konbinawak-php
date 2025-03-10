<?php
require_once "../db/db-article.php";

$article = getArticleById($_GET["id"]);

$pageTitle = $article["title"];
$title = "Konbinawak - $pageTitle";
include_once "../components/header.php";

if (!$article) {
    include "../includes/article-not-found.php";
}

$isCreator = isset($_SESSION["user_id"]) && $_SESSION["user_id"] === $article["user_id"];
?>

<main class="flex flex-column align-item-center gap-50">
    <section class="article-content flex flex-column gap-20">
        <div class="article-attribute flex flex-wrap justify-between align-item-right gap-10">
            <div>
                <p><strong><?php echo $article["username"] ?></strong></p>
                <p>Créer le <?php echo date("d-m-Y", strtotime($article["created_at"])) ?></p>
            </div>
            <span class="article-tag <?php echo ($article["category_color"] ?: "tag-archive") ?>">
                <p class="p-min"><?php echo ($article["category_name"] ?: "Non classé") ?></p>
            </span>
        </div>

        <?php if ($isCreator) : ?>
            <div class="flex gap-10">
                <a href="edit-article.php?id=<?php echo $article["id"]; ?>" class="btn-primary">Modifier</a>
                <form action="delete-article.php" method="POST"
                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">
                    <input type="hidden" name="id" value="<?php echo $article["id"]; ?>">
                    <button type="submit" class="btn-danger">Supprimer</button>
                </form>
            </div>
        <?php endif; ?>

        <div class="flex flex-column gap-10">
            <h1><?php echo ($article["title"]) ?></h1>
            <p class="p-grey"><?php echo ($article["description"]) ?></p>
        </div>
    </section>

    <section class="article-content flex flex-column">
        <img class="article-cover"
            src="<?php echo ($article["img_cover"] ?: "/assets/images/articles/cover-null.webp") ?>"
            alt="<?php echo ($article["title"]) ?>">
    </section>

    <section class="article-content flex flex-column">
        <p><?php echo nl2br(($article["content"])) ?></p>
    </section>

    <section id="section-comments" class="article-content flex flex-column gap-50 mt-200">
        <h2>Commentaires</h2>
        <div class="flex flex-column gap-10">
            <?php include_once "../components/create-comment.php" ?>
            <?php include "../components/article-comment.php" ?>
        </div>
    </section>
</main>

<?php include_once "../components/footer.php"; ?>