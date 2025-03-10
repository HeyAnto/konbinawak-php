<?php
require_once __DIR__ . "/../pages/connection/init.php";

require_once "../db/db-article.php";
require_once "../db/db-user.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: ../connection/login.php");
    exit;
}

$title = "Konbinawak - Modification";
include_once "../components/header.php";
require_once "../db/db-article.php";

$articleId = $_GET["id"];
$article = getArticleById($articleId);

if (!$article || $article["user_id"] !== $_SESSION["user_id"]) {
    header("Location: ../includes/not-authorized.php");
    exit;
}

$categories = getCategories();
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $content = trim($_POST["content"]);
    $category_id = $_POST["category"];

    if (!empty($title) && !empty($description) && !empty($content) && $category_id) {
        if (updateArticle($articleId, $title, $description, $content, $category_id)) {
            header("Location: article.php?id=" . $articleId);
            exit;
        } else {
            $message = "Erreur lors de la mise à jour de l'article.";
        }
    } else {
        $message = "Tous les champs doivent être remplis.";
    }
}
?>

<main class="flex flex-column align-item-center gap-100">
    <section class="create-container flex flex-column gap-10">
        <form class="flex flex-column gap-20" method="POST" action="">
            <div class="flex flex-column gap-10">
                <div class="flex flex-column gap-5">
                    <label for="title">Titre</label>
                    <input class="form-input" type="text" id="title" name="title" placeholder="Titre" maxlength="255"
                        value="<?php echo htmlspecialchars($article["title"]); ?>" autocomplete="off" required>
                </div>
                <div class="flex flex-column gap-5">
                    <label for="description">Description</label>
                    <input class="form-input" type="text" id="description" name="description" placeholder="Description"
                        value="<?php echo htmlspecialchars($article["description"]); ?>" maxlength="255"
                        autocomplete="off" required>
                </div>
                <div class="flex flex-column gap-5">
                    <label for="content">Contenu</label>
                    <textarea class="form-input" id="content" name="content" rows="4"
                        placeholder="Cette belle histoire commence par..."
                        required><?php echo htmlspecialchars($article["content"]); ?></textarea>
                </div>
                <div class="flex flex-column gap-5">
                    <label for="category">Catégorie</label>
                    <select class="form-input" id="category" name="category" required>
                        <option value="" disabled>Choisissez une catégorie</option>
                        <?php
                        foreach ($categories as $category) {
                            $selected = $category["id"] === $article["category_id"] ? "selected" : "";
                            echo "<option value='{$category['id']}' $selected>{$category['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <?php if (!empty($message)) : ?>
                <p style="color: red; font-size:0.75rem;"><?php echo $message ?></p>
            <?php endif; ?>
            <button type="submit" class="btn-primary">Enregistrer les modifications</button>
        </form>
    </section>
</main>

<?php include_once "../components/footer.php"; ?>