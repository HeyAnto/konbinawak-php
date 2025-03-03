<?php
require_once "../db/db-article.php";

$article = getArticleById($_GET["id"]);

if (!$article) {
    include "../components/article-not-found.php";
}

$pageTitle = $article["title"];
$title = "Konbinawak - $pageTitle";
include_once "../components/header.php";
?>

<main class="flex flex-column align-item-center gap-50">
    <section class="article-content flex flex-column gap-20">
        <div class="article-attribute flex flex-wrap justify-between gap-10">
            <p>Créer le <?php echo date("d-m-Y", strtotime($article["created_at"])) ?></p>
            <span class="article-tag <?php echo ($article["category_color"]) ?>">
                <p class="p-min"><?php echo ($article["category_name"] ?: "Non classé") ?></p>
            </span>
        </div>

        <div class="flex flex-column gap-10">
            <h1><?php echo ($article["title"]) ?></h1>
            <p class="p-grey"><?php echo ($article["description"]) ?></p>
        </div>
    </section>

    <section class="article-content flex flex-column">
        <img class="article-cover"
            src="<?php echo ($article["img_cover"] ?: "/assets/images/articles/cover-null.jpg") ?>"
            alt="<?php echo ($article["title"]) ?>">
    </section>

    <section class="article-content flex flex-column">
        <p><?php echo nl2br(($article["content"])) ?></p>
    </section>

    <section id="section-comments" class="article-content flex flex-column gap-50 mt-200">
        <h2>Commentaires</h2>
        <div class="flex flex-column gap-10">
            <?php include_once "../components/form-comment.php" ?>
            <?php include "../components/article-comment.php" ?>
        </div>
    </section>
</main>

<?php
include_once "../components/footer.php";
?>