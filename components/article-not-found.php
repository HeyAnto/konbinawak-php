<?php
$pageTitle = "Article introuvable";
$title = "Konbinawak - $pageTitle";
include_once "../components/header.php";
?>

<div id="loading-screen" class="overlay-display flex flex-column justify-center align-item-center gap-10">
    <img src="/assets/images/utilities/full-logo-dark.svg" alt="Logo Konbinawak">
    <p>L'article a été supprimé ou n'existe pas.</p>
    <a class="btn-primary" href="../index.php">Retour</a>
</div>

<?php
include_once "../components/footer.php";
exit;
?>