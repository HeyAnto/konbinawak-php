<?php
require_once "../pages/connection/init.php";
require_once "../db/db-comments.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: ../pages/connection/login.php");
    exit;
}

$commentId = $_POST["comment_id"];
$comment = getCommentById($commentId);

if (!$comment || $comment["user_id"] !== $_SESSION["user_id"]) {
    header("Location: ../includes/article-not-found.php");
    exit;
}

if (deleteComment($commentId)) {
    header("Location: ../pages/article.php?id=" . $comment["article_id"]);
    exit;
} else {
    echo "Erreur lors de la suppression du commentaire.";
}
