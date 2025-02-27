<?php
$title = "Konbinawak - Article";
include_once "../components/header.php";
?>

<main class="flex flex-column align-item-center gap-50">
    <section class="article-content flex flex-column gap-20">
        <div class="article-attribute flex">
            <p>Créer le ...</p>
        </div>
        <div class="flex flex-column gap-10">
            <h1>Titre Article</h1>
            <p>Description de l'article.</p>
        </div>
    </section>
    <section class="article-content flex flex-column gap-10">
        <img class="article-cover" src="/assets/images/articles/cover-null.jpg" alt="Cover Null">
    </section>
    <section class="article-content flex flex-column gap-10">
        <p>Contenue de l'article...</p>
    </section>
</main>

<?php
include_once "../components/footer.php";
?>