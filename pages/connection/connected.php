<?php
$title = "Konbinawak - Bravo! 👏🏻";
include_once "../../components/header.php";
?>

<div id="loading-screen" class="overlay-display flex flex-column justify-center align-item-center gap-10">
    <img src="/assets/images/utilities/full-logo-dark.svg" alt="Logo Konbinawak">
    <div>
        <p>Bienvenue, <strong><?php echo $_SESSION["username"]; ?></strong> ! Vous êtes connecter.</p>
        <p>Vous pouvez désormais écrire des commentaires.</p>
    </div>
    <a class="btn-primary" href="/index.php">Retour</a>
</div>

<?php include_once "../../components/footer.php"; ?>