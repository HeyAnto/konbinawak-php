<?php
require_once "../db/pdo.php";
$pageTitle = "Erreur Base de Données";
$title = "Konbinawak - $pageTitle";
include_once "../components/header.php";
?>

<div id="loading-screen" class="overlay-display flex flex-column justify-center align-item-center gap-10">
    <img src="/assets/images/utilities/full-logo-dark.svg" alt="Logo Konbinawak">
    <p><?php echo "Erreur lors de la connexion à la base de données : " . $e->getMessage(); ?></p>
</div>

<?php
include_once "../components/footer.php";
exit;
?>