<?php
$title = "Konbinawak - Archives";
include_once "../components/head.php";
?>

<?php
include_once "../components/navbar.php"
?>

<main class="flex flex-column align-item-center">
    <section class="flex flex-column gap-50">
        <h1 style="text-align: center;">Nos Archives</h1>
        <a href=""></a>
        <div class="archives-content">
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