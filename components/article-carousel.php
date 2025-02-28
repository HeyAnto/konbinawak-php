<?php
require_once "./db/db-article.php";
$articles = getFeaturedArticles();
?>

<section class="carousel flex flex-column gap-20">
    <h1>À la une sur Konbinawak</h1>
    <div class="carousel-inner flex">
        <?php foreach ($articles as $article): ?>
            <a href="../pages/article.php?id=<?= htmlspecialchars($article["id"]) ?>" class="carousel-item">
                <img class="article-cover" src="<?= $article["img_cover"] ?: "/assets/images/articles/cover-null.webp" ?>"
                    alt="<?= $article["title"] ?>">
                <div class="flex flex-column gap-5 mt-20">
                    <h2><?= $article["title"] ?></h2>
                    <p class="p-grey"><?= $article["description"] ?></p>
                    <span class="article-tag <?= $article["category_color"] ?: "tag-default" ?>">
                        <p class="p-min"><?= $article["category_name"] ?: "Non classé" ?></p>
                    </span>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" onclick="prevSlide()">&#10094;</button>
    <button class="carousel-control-next" onclick="nextSlide()">&#10095;</button>
    <script src="/scripts/carousel.js"></script>
</section>