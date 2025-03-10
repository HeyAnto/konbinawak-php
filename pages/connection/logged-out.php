<?php
$title = "Konbinawak - Au revoir 🥺";
include_once "../../components/header.php";
?>

<div id="loading-screen" class="overlay-display flex flex-column justify-center align-item-center gap-10">
    <img src="/assets/images/utilities/full-logo-dark.svg" alt="Logo Konbinawak">
    <div>
        <?php if (isset($_SESSION["user_id"])) : ?>
            <p>Au revoir, <strong><?php echo $_SESSION["username"]; ?></strong> !</p>
        <?php endif; ?>
        <p>Vous êtes maintenant déconnecté. 🥺</p>
    </div>
    <a class="btn-primary" href="/pages/connection/logout.php">Retour</a>
</div>

<?php include_once "../../components/footer.php"; ?>