<?php

if (!isset($articles)) {
    require_once "../db/db-article.php";
    $articles = getArticles();
}

$isIndexPage = basename($_SERVER['PHP_SELF']) === "index.php";
$articlePath = $isIndexPage ? "./pages/article.php" : "article.php";
?>

<?php foreach ($articles as $article): ?>
    <a href="<?php echo $articlePath ?>?id=<?php echo htmlspecialchars($article["id"]) ?>" class="article-card flex
    flex-column gap-10">
        <img class="card-cover" src="<?php echo ($article["img_cover"] ?: "/assets/images/articles/cover-null.webp") ?>"
            alt="<?php echo $article["title"] ?>">
        <div class="flex flex-column gap-5">
            <h2><?php echo $article["title"] ?></h2>
            <p class="p-grey"><?php echo $article["description"] ?: "tag-archive" ?></p>
            <span class="article-tag <?php echo $article["category_color"] ?>">
                <p class="p-min"><?php echo $article["category_name"] ?: "Non classé" ?></p>
            </span>
        </div>
    </a>
<?php endforeach; ?>