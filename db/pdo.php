<?php
$host = "127.0.0.1";
$dbname = "konbinawak";
$port = "3306";
$charset = "utf8";

$user = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$dbname;port=$port;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";

} catch (PDOException $e) {
    echo "Connection failed : " . $e->getMessage();
}
