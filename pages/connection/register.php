<?php
$title = "Konbinawak - Inscription";
include_once "../../components/header.php";
require_once "../../db/db-user.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST["password"]);

    if (!empty($username) && !empty($email) && !empty($password)) {
        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password)) {
            $message = "Le mot de passe doit contenir au moins 8 caractères, une majuscule et un chiffre.";
        } elseif (emailExists($email)) {
            $message = "Cet email est déjà utilisé.";
        } elseif (usernameExists($username)) {
            $message = "Username déjà utilisé.";
        } else {
            if (userRegister($username, $email, $password)) {
                header("Location: connected.php");
                exit;
            } else {
                $message = "Erreur lors de l'inscription";
            }
        }
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
                        autocomplete="off" pattern="[A-Za-z0-9]+" required>
                </div>

                <div class="flex flex-column gap-5">
                    <label for="email">Email</label>
                    <input class="form-input" type="email" id="email" name="email" placeholder="exemple@gmail.com"
                        maxlength="255" autocomplete="off" required>
                </div>

                <div id="password-register" class="flex flex-column gap-5">
                    <label for="password">Password</label>
                    <div class="password-container">
                        <input class="form-input" type="password" id="password" name="password" maxlength="255"
                            autocomplete="off" required>
                        <button type="button" id="togglePassword">🐵</button>
                    </div>
                </div>
            </div>

            <?php if (!empty($message)) : ?>
                <p style="color: red; font-size:0.75rem;"><?php echo $message ?></p>
            <?php endif; ?>

            <button type="submit" class="btn-primary">Finaliser</button>

            <script src="/scripts/password.js"></script>
        </form>
    </section>
</main>

<?php include_once "../../components/footer.php"; ?>