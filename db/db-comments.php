<?php
require_once "pdo.php";

function getComments($article_id)
{
    global $pdo;

    if (!is_numeric($article_id)) {
        return [];
    }

    $sql = "SELECT *
            FROM article_comments
            WHERE article_id = ?
            ORDER BY created_at DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$article_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function createComment($articleId, $username, $content): bool
{
    global $pdo;
    $sql = "INSERT INTO article_comments 
            (article_id, username, content) 
            VALUES (:article_id, :username, :content)";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ":username" => ($username),
        ":content" => ($content),
        ":article_id" => $articleId,
    ]);
}
