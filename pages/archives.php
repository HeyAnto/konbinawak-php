<?php
$title = "Konbinawak - Archives";
include_once "../components/header.php";
?>

<main class="flex flex-column align-item-center gap-100">
    <section class="flex flex-column align-item-center gap-10">
        <mark class="page-title tag-archive">
            <h1>Archives</h1>
        </mark>
        <h2 style="text-align: center;">Toutes les archives de Konbinawak</h2>
    </section>
    <section class="archives-content">
        <?php
        for ($i = 0; $i < 9; $i++) {
            include "../components/article-card.php";
        }
        ?>
    </section>
    <section class="flex flex-column align-item-center gap-10">
        <img class="no-more" src="/assets/images/no-more.gif" alt="No More Article">
        <p class="p-grey">Il n'y a rien de plus pour l'instant...</p>
    </section>
</main>

<?php
include_once "../components/footer.php";
?>