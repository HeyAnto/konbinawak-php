<!DOCTYPE html>
<html lang="fr">

<head class="flex flex-column">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title ?? "Konbinawak"; ?></title>

    <link rel="icon" type="image/svg+xml" href="/assets/favicon.svg">
    <link rel="stylesheet" href="/assets/css/globals.css">
</head>

<body>

    <?php
    include_once "navbar.php";
    include_once __DIR__ . "/../includes/loading-screen.php";
    ?>