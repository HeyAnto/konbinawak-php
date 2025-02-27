<?php
require_once "../db/article-db.php";
$category_id = 1;
$articles = getArticlesByCategory($category_id);
$title = "Konbinawak - Gaming";
include_once "../components/header.php";
?>

<main class="flex flex-column align-item-center gap-100">
    <section class="flex flex-column align-item-center gap-10">
        <span class="page-title tag-gaming">
            <h1>Gaming</h1>
        </span>
        <h2 style="text-align: center;">Tout sur les jeux vidéos</h2>
    </section>

    <section class="card-container flex flex-wrap gap-20">
        <?php include "../components/article-card.php"; ?>
    </section>

    <section class="flex flex-column align-item-center gap-10">
        <img class="no-more" src="/assets/images/no-more.gif" alt="No More Article">
        <p class="p-grey">Il n'y a rien de plus pour l'instant...</p>
    </section>
</main>

<?php
include_once "../components/footer.php";
?>