<?php
include_once "./components/header.php";
require_once "./db/db-article.php";

$politiqueArticles = getArticlesByCategory(2, 3);
$wtfArticles = getArticlesByCategory(3, 3);
$gamingArticles = getArticlesByCategory(1, 3);
?>

<main class="flex flex-column align-item-center gap-100">
    <?php include_once "./components/article-carousel.php"; ?>

    <section class="flex flex-column gap-10">
        <a href="./pages/politique.php" class="flex">
            <span class="page-title tag-politique">
                <h2>Politique</h2>
            </span>
        </a>
        <div class="card-container flex flex-wrap gap-20">
            <?php
            $articles = $politiqueArticles;
            include "./components/article-card.php";
            ?>
        </div>
    </section>

    <section class="flex flex-column gap-10">
        <a href="./pages/wtf.php" class="flex">
            <span class="page-title tag-wtf">
                <h2>WTF</h2>
            </span>
        </a>
        <div class="card-container flex flex-wrap gap-20">
            <?php
            $articles = $wtfArticles;
            include "./components/article-card.php";
            ?>
        </div>
    </section>

    <section class="flex flex-column gap-10">
        <a href="./pages/gaming.php" class="flex">
            <span class="page-title tag-gaming">
                <h2>Gaming</h2>
            </span>
        </a>
        <div class="card-container flex flex-wrap gap-20">
            <?php
            $articles = $gamingArticles;
            include "./components/article-card.php";
            ?>
        </div>
    </section>
</main>

<?php include_once "./components/footer.php"; ?>