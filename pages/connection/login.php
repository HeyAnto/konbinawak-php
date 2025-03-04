<?php
$title = "Konbinawak - Connexion";
include_once "../../components/header.php";
?>

<main class="flex flex-column align-item-center gap-100">
    <section class="create-container flex flex-column gap-50">
        <div>
            <h1>Connectez-vous</h1>
            <p>Vous êtes nouveaux ? <a href="register.php">Inscrivez-vous</a> !</p>
        </div>

        <form class="flex flex-column gap-20" method="POST" action="">
            <div class="flex flex-column gap-10">
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

            <button type="submit" class="btn-primary">Connecter</button>
            <script src="/scripts/password.js"></script>
        </form>
    </section>
</main>

<?php include_once "../../components/footer.php"; ?>