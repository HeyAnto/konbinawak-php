<?php
require_once "pdo.php";

function userRegister($username, $email, $password, $role = 'user')
{
    global $pdo;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (username, email, password, role) VALUES (?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email, $hashedPassword, $role]);
    return $pdo->lastInsertId();
}

function usernameExists($username)
{
    global $pdo;

    $sql = "SELECT COUNT(*) FROM user WHERE username = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    return $stmt->fetchColumn() > 0;
}

function emailExists($email)
{
    global $pdo;

    $sql = "SELECT COUNT(*) FROM user WHERE email = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->fetchColumn() > 0;
}

function getUserByEmail($email)
{
    global $pdo;

    $sql = "SELECT * FROM user WHERE email = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
