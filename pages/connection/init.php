<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

if (isset($_SESSION["user_id"])) {
    if (isset($_SESSION["LAST_ACTIVITY"]) && (time() - $_SESSION["LAST_ACTIVITY"] > 1800)) {
        session_unset();
        session_destroy();
        header("Location: ../pages/connection/logged-out.php");
        exit;
    }

    $_SESSION["LAST_ACTIVITY"] = time();
}
