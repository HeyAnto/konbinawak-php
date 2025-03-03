<?php
$currentPage = basename($_SERVER['PHP_SELF'], ".php");
?>

<header>
    <div class="nav-content flex flex-column align-item-center gap-10">
        <div class="header-action flex align-item-center justify-content gap-10">
            <a class="<?= $currentPage === 'index' ? 'disabled' : '' ?>" href="/index.php">
                <img src="/assets/images/utilities/full-logo.svg" alt="Logo Konbinawak">
            </a>
            <a class="btn-nav-action" href="../pages/create-article.php">
                <p>Créer</p>
            </a>
        </div>
        <nav class="flex flex-row justify-center gap-10">
            <a class="btn-nav <?php echo $currentPage === 'index' ? 'nav-active disabled' : '' ?>" href="/index.php"
                data-page="index">
                <p>Accueil</p>
            </a>
            <a class="btn-nav <?php echo $currentPage === 'gaming' ? 'nav-active disabled' : '' ?>"
                href="/pages/gaming.php" data-page="gaming">
                <p>Gaming</p>
            </a>
            <a class="btn-nav <?php echo $currentPage === 'politique' ? 'nav-active disabled' : '' ?>"
                href="/pages/politique.php" data-page="politique">
                <p>Politique</p>
            </a>
            <a class="btn-nav <?php echo $currentPage === 'selvi' ? 'nav-active disabled' : '' ?>"
                href="/pages/selvi.php" data-page="selvi">
                <p>Selvi</p>
            </a>
            <a class="btn-nav <?php echo $currentPage === 'wtf' ? 'nav-active disabled' : '' ?>" href="/pages/wtf.php"
                data-page="wtf">
                <p>WTF</p>
            </a>
            <a class="btn-nav <?php echo $currentPage === 'archives' ? 'nav-active disabled' : '' ?>"
                href="/pages/archives.php" data-page="archives">
                <p>Archives</p>
            </a>
        </nav>
    </div>
    <div class="style-head"></div>
</header>