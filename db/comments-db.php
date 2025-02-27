<?php
require_once "pdo.php";

function getComments($article_id)
{
    global $pdo;

    if (!is_numeric($article_id)) {
        return null;
    }

    $sql = "SELECT *
            FROM article_comments
            WHERE article_id = ?
            ORDER BY created_at DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$article_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
