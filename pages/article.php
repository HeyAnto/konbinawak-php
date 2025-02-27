<?php
require_once "../db/article-db.php";
$article = getArticleById($_GET["id"]);
$pageTitle = ($article["title"]);
$title = "Konbinawak - $pageTitle";
include_once "../components/header.php";
?>

<main class="flex flex-column align-item-center gap-50">
    <section class="article-content flex flex-column gap-20">
        <div class="article-attribute flex justify-between">
            <p>Créer le <?= ($article["created_at"]) ?></p>
            <span class="article-tag <?= ($article["category_color"]) ?>">
                <p class="p-min"><?= ($article["category_name"] ?: "Non classé") ?></p>
            </span>
        </div>

        <div class="flex flex-column gap-10">
            <h1><?= ($article["title"]) ?></h1>
            <p><?= ($article["description"]) ?></p>
        </div>
    </section>

    <section class="article-content flex flex-column gap-10">
        <img class="article-cover" src="<?= ($article["img_cover"] ?: "/assets/images/articles/cover-null.jpg") ?>"
            alt="<?= ($article["title"]) ?>">
    </section>

    <section class="article-content flex flex-column gap-10">
        <p><?= nl2br(($article["content"])) ?></p>
    </section>
</main>

<?php
include_once "../components/footer.php";
?>