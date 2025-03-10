<?php

$host = "127.0.0.1";
$dbname = "konbinawak";
$port = "3306";
$charset = "utf8mb4";

$user = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$dbname;port=$port;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    include_once __DIR__ . "/../db/db-not-found.php";
}
