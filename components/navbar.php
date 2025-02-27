<?php
$currentPage = basename($_SERVER['PHP_SELF'], ".php");
?>

<header>
    <div class="nav-content flex flex-column align-item-center gap-20">
        <a href="/index.php">
            <img src="/assets/images/utilities/full-logo.svg" alt="Logo Konbinawak">
        </a>
        <nav class="flex flex-row justify-center gap-10">
            <a class="btn-nav <?= $currentPage === 'index' ? 'nav-active' : '' ?>" href="/index.php" data-page="index">
                <p>Accueil</p>
            </a>
            <a class="btn-nav <?= $currentPage === 'gaming' ? 'nav-active' : '' ?>" href="/pages/gaming.php"
                data-page="gaming">
                <p>Gaming</p>
            </a>
            <a class="btn-nav <?= $currentPage === 'politique' ? 'nav-active' : '' ?>" href="/pages/politique.php"
                data-page="politique">
                <p>Politique</p>
            </a>
            <a class="btn-nav <?= $currentPage === 'selvi' ? 'nav-active' : '' ?>" href="/pages/selvi.php"
                data-page="selvi">
                <p>Selvi</p>
            </a>
            <a class="btn-nav <?= $currentPage === 'wtf' ? 'nav-active' : '' ?>" href="/pages/wtf.php" data-page="wtf">
                <p>WTF</p>
            </a>
            <a class="btn-nav <?= $currentPage === 'archives' ? 'nav-active' : '' ?>" href="/pages/archives.php"
                data-page="archives">
                <p>Archives</p>
            </a>
        </nav>
    </div>
    <div class="style-head"></div>
</header>

<!-- <header>
    <div class="nav-content flex flex-column align-item-center gap-20">
        <a href="/index.php">
            <img src="/assets/images/utilities/full-logo.svg" alt="Logo Konbinawak">
        </a>
        <nav class="flex flex-row justify-center gap-10">
            <a class="btn-nav" href="/index.php" data-page="index">
                <p>Accueil</p>
            </a>
            <a class="btn-nav" href="/pages/gaming.php" data-page="gaming">
                <p>Gaming</p>
            </a>
            <a class="btn-nav" href="/pages/politique.php" data-page="politique">
                <p>Politique</p>
            </a>
            <a class="btn-nav" href="/pages/wtf.php" data-page="wtf">
                <p>WTF</p>
            </a>
            <a class="btn-nav" href="/pages/archives.php" data-page="archives">
                <p>Archives</p>
            </a>
        </nav>
    </div>
    <div class="style-head"></div>
</header> -->