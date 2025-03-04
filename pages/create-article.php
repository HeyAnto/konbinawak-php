<?php
$title = "Konbinawak - Création";
include_once "../components/header.php";
require_once "../db/db-article.php";

$categories = getCategories();
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $content = $_POST["content"];
    $category_id = $_POST["category"];

    if (!empty($title) && !empty($description) && !empty($content) && $category_id) {
        if (insertArticle($title, $description, $content, $category_id)) {
            $message = "Article ajouté avec succès !";
        } else {
            $message = "Erreur lors de l'insertion de l'article.";
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
                        autocomplete="off" required>
                </div>
                <div class="flex flex-column gap-5">
                    <label for="description">Description</label>
                    <input class="form-input" type="text" id="description" name="description" placeholder="Description"
                        maxlength="255" autocomplete="off" required>
                </div>
                <div class="flex flex-column gap-5">
                    <label for="image">Cover Article</label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
                <div class="flex flex-column gap-5">
                    <label for="content">Contenu</label>
                    <textarea class="form-input" id="content" name="content" rows="4"
                        placeholder="Cette belle histoire commence par..." required></textarea>
                </div>
                <div class="flex flex-column gap-5">
                    <label for="category"></label>
                    <select class="form-input" id="category" name="category" required>
                        <option value="" disabled selected>Choisissez une catégorie</option>
                        <?php
                        foreach ($categories as $category) {
                            echo "<option value='{$category['id']}'>{$category['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <p><?php echo $message ?></p>
            <button type="submit" class="btn-primary">Envoyer</button>
        </form>
    </section>
</main>

<?php include_once "../components/footer.php"; ?>