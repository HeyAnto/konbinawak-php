<?php
$title = "Konbinawak - Inscription";
include_once "../../components/header.php";
require_once "../../db/db-user.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($username) && !empty($email) && !empty($password)) {
        if (userRegister($username, $email, $password)) {
            include_once "connected.php";
            exit;
        } else {
            $message = "Erreur lors de l'inscription";
        }
    } else {
        $message = "Tous les champs doivent être remplis.";
    }
}
?>


<main class="flex flex-column align-item-center gap-100">
    <section class="create-container flex flex-column gap-50">
        <div>
            <h1>Inscrivez-vous</h1>
            <p>Vous avez un compte ? <a href="login.php">Connectez-vous</a> !</p>
        </div>

        <form class="flex flex-column gap-20" method="POST" action="">
            <div class="flex flex-column gap-10">
                <div class="flex flex-column gap-5">
                    <label for="username">Username</label>
                    <input class="form-input" type="text" id="username" name="username" maxlength="255"
                        autocomplete="off" pattern="[A-Za-z0-9 ]+" required>
                </div>

                <div class="flex flex-column gap-5">
                    <label for="email">Email</label>
                    <input class="form-input" type="email" id="email" name="email" placeholder="exemple@gmail.com"
                        maxlength="255" autocomplete="off" required>
                </div>

                <div class="flex flex-column gap-5">
                    <label for="password">Password</label>
                    <div class="password-container">
                        <input class="form-input" type="password" id="password" name="password" maxlength="255"
                            autocomplete="off" required>
                        <button type="button" id="togglePassword">🐵</button>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-primary">Finaliser</button>
            <script src="/scripts/password.js"></script>
        </form>
    </section>
</main>

<?php include_once "../../components/footer.php"; ?>