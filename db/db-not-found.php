<?php require_once __DIR__ . "/../db/pdo.php"; ?>

<div id="loading-screen" class="overlay-display flex flex-column justify-center align-item-center gap-10">
    <img src="/assets/images/utilities/full-logo-dark.svg" alt="Logo Konbinawak">
    <p><?php echo "Erreur lors de la connexion à la base de données : " . $e->getMessage(); ?></p>
</div>