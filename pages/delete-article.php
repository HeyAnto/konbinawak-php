<?php
require_once __DIR__ . "/../pages/connection/init.php";

require_once "../db/db-article.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: ../connection/login.php");
    exit;
}

$articleId = $_POST["id"];
$article = getArticleById($articleId);

if (!$article || $article["user_id"] !== $_SESSION["user_id"]) {
    header("Location: ../includes/not-authorized.php");
    exit;
}

if (deleteArticle($articleId)) {
    header("Location: ../index.php");
    exit;
} else {
    echo "Erreur lors de la suppression de l'article.";
}
