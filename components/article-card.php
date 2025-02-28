<?php
if (!isset($articles)) {
    require_once "../db/db-article.php";
    $articles = getArticles();
}
?>

<?php foreach ($articles as $article): ?>
    <a href="article.php?id=<?= htmlspecialchars($article["id"]) ?>" class="article-card flex flex-column gap-10">
        <img class="article-cover" src="<?= ($article["img_cover"] ?: "/assets/images/articles/cover-null.webp") ?>"
            alt="Article Image">
        <div class="flex flex-column gap-5">
            <h2><?= ($article["title"]) ?></h2>
            <p class="p-grey"><?= ($article["description"]) ?></p>
            <span class="article-tag <?= ($article["category_color"]) ?>">
                <p class="p-min"><?= ($article["category_name"] ?: "Non classé") ?></p>
            </span>
        </div>
    </a>
<?php endforeach; ?>