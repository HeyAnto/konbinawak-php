<?php
require_once "pdo.php";

function getComments($article_id)
{
    global $pdo;

    if (!is_numeric($article_id)) {
        return [];
    }

    $sql = "SELECT article_comments.*, user.username 
            FROM article_comments 
            LEFT JOIN user ON article_comments.user_id = user.id 
            WHERE article_id = ? 
            ORDER BY created_at DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$article_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function createComment($articleId, $userId, $content): bool
{
    global $pdo;
    $sql = "INSERT INTO article_comments 
            (article_id, user_id, content) 
            VALUES (:article_id, :user_id, :content)";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ":article_id" => $articleId,
        ":user_id" => $userId,
        ":content" => $content,
    ]);
}

function getCommentById($id)
{
    global $pdo;

    if (!is_numeric($id)) {
        return null;
    }

    $sql = "SELECT * FROM article_comments WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function deleteComment($id)
{
    global $pdo;

    $sql = "DELETE FROM article_comments WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}
