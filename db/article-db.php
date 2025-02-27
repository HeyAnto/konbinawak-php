<?php

require_once "./pdo.php";

function getArticle(int $id)
{
    global $pdo;
    $sql = "SELECT * FROM articles";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $articles = $stmt->fetchAll();
    return $articles;
}
