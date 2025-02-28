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

function getArticlesByCategory($category_id)
{
    global $pdo;
    $sql = "SELECT articles.*, category.name AS category_name, category.color AS category_color
            FROM articles 
            LEFT JOIN category ON articles.category_id = category.id
            WHERE articles.category_id = ?";

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

    $sql = "SELECT articles.*, category.name AS category_name, category.color AS category_color 
            FROM articles 
            LEFT JOIN category ON articles.category_id = category.id 
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
