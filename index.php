<?php
include_once "./components/header.php";
require_once "./db/db-article.php";

$gamingArticles = getArticlesByCategory(1);
$politiqueArticles = getArticlesByCategory(2);
$wtfArticles = getArticlesByCategory(3);
?>

<main class="flex flex-column align-item-center gap-100">
    <?php include_once "./components/article-carousel.php"; ?>

    <section class="flex flex-column gap-10">
        <a href="./pages/politique.php" class="flex">
            <span class="page-title tag-politique">
                <h1>Politique</h1>
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
                <h1>WTF</h1>
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
                <h1>Gaming</h1>
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