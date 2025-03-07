<?php
require_once "pdo.php";

function userRegister($username, $email, $password)
{
    global $pdo;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (username, email, password, created_at) 
            VALUES (?, ?, ?, NOW())";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$username, $email, $hashedPassword]);
}

function emailExists($email)
{
    global $pdo;

    $sql = "SELECT COUNT(*) FROM user WHERE email = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->fetchColumn() > 0;
}
