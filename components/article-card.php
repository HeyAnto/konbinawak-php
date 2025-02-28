<?php
if (!isset($articles)) {
    require_once "../db/db-article.php";
    $articles = getArticles();
}

$isIndexPage = basename($_SERVER['PHP_SELF']) === "index.php";
$articlePath = $isIndexPage ? "./pages/article.php" : "article.php";
?>

<?php foreach ($articles as $article): ?>
    <a href="<?= $articlePath ?>?id=<?= htmlspecialchars($article["id"]) ?>" class="article-card flex flex-column gap-10">
        <img class="article-cover" src="<?= ($article["img_cover"] ?: "/assets/images/articles/cover-null.webp") ?>"
            alt="Article Image">
        <div class="flex flex-column gap-5">
            <h2><?= htmlspecialchars($article["title"]) ?></h2>
            <p class="p-grey"><?= htmlspecialchars($article["description"]) ?></p>
            <span class="article-tag <?= htmlspecialchars($article["category_color"]) ?>">
                <p class="p-min"><?= htmlspecialchars($article["category_name"] ?: "Non classé") ?></p>
            </span>
        </div>
    </a>
<?php endforeach; ?>