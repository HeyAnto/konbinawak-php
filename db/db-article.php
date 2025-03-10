<?php
require_once "pdo.php";

function getArticles()
{
    global $pdo;
    $sql = "SELECT articles.*, category.name AS category_name, category.color AS category_color
            FROM articles 
            LEFT JOIN category ON articles.category_id = category.id
            ORDER BY articles.created_at DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getCategories()
{
    global $pdo;
    $sql = "SELECT * FROM category ORDER BY name ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getArticlesByCategory($category_id, $limit = null)
{
    global $pdo;
    $sql = "SELECT articles.*, category.name AS category_name, category.color AS category_color
            FROM articles 
            LEFT JOIN category ON articles.category_id = category.id
            WHERE articles.category_id = ?
            ORDER BY articles.created_at DESC";

    if ($limit) {
        $sql .= " LIMIT " . intval($limit);
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$category_id]);

    return $stmt->fetchAll();
}

function getArticleById($id)
{
    global $pdo;

    if (!is_numeric($id)) {
        return null;
    }

    $sql = "SELECT articles.*, category.name AS category_name, category.color AS category_color, user.username 
            FROM articles 
            LEFT JOIN category ON articles.category_id = category.id 
            LEFT JOIN user ON articles.user_id = user.id 
            WHERE articles.id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getFeaturedArticles()
{
    global $pdo;

    $id = [11, 6, 3];
    $idString = implode(",", array_map("intval", $id));

    $sql = "SELECT articles.*, category.name AS category_name, category.color AS category_color 
            FROM articles 
            LEFT JOIN category ON articles.category_id = category.id 
            WHERE articles.id IN ($idString)
            ORDER BY FIELD(articles.id, $idString)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function insertArticle($title, $description, $content, $category_id, $user_id, $img_cover = null)
{
    global $pdo;

    $sql = "INSERT INTO articles (title, description, content, category_id, created_at, user_id, img_cover) 
            VALUES (?, ?, ?, ?, NOW(), ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $description, $content, $category_id, $user_id, $img_cover]);
    return $pdo->lastInsertId();
}

function updateArticle($id, $title, $description, $content, $category_id)
{
    global $pdo;

    $sql = "UPDATE articles 
            SET title = ?, description = ?, content = ?, category_id = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$title, $description, $content, $category_id, $id]);
}

function deleteArticle($id)
{
    global $pdo;

    $sql = "DELETE FROM articles WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}
