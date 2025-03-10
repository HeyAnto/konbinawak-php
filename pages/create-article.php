<?php
require_once __DIR__ . "/../pages/connection/init.php";

$userRole = $_SESSION["role"] ?? 'user';
if ($userRole !== 'admin' && $userRole !== 'editor') {
    header("Location: connection/not-authorized.php");
    exit;
}

$title = "Konbinawak - Création";
include_once "../components/header.php";
require_once "../db/db-article.php";

$categories = getCategories();
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $content = trim($_POST["content"]);
    $category_id = $_POST["category"];
    $user_id = $_SESSION["user_id"];

    // Gestion Upload Image
    $img_cover = null;
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . "/../assets/images/articles/";

        // Informations Fichier
        $fileName = $_FILES["image"]["name"];
        $fileTmpName = $_FILES["image"]["tmp_name"];
        $fileSize = $_FILES["image"]["size"];
        $fileType = $_FILES["image"]["type"];

        $maxFileSize = 5 * 1024 * 1024; // 5 Mo
        if ($fileSize > $maxFileSize) {
            $message = "Le fichier est trop volumineux. Taille maximale : 5 Mo.";
        } else {
            $allowedMimeTypes = ["image/jpeg", "image/png", "image/webp"];
            if (in_array($fileType, $allowedMimeTypes)) {
                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $allowedExtensions = ["jpg", "jpeg", "png", "webp"];
                if (in_array($fileExtension, $allowedExtensions)) {
                    $newFileName = uniqid("article_", true) . "." . $fileExtension;
                    $uploadFile = $uploadDir . $newFileName;

                    if (move_uploaded_file($fileTmpName, $uploadFile)) {
                        $img_cover = "/assets/images/articles/" . $newFileName;
                    } else {
                        $message = "Erreur lors de l'upload de l'image.";
                    }
                } else {
                    $message = "Type de fichier non autorisé. Formats acceptés : JPEG, PNG, WebP.";
                }
            } else {
                $message = "Type de fichier non autorisé. Formats acceptés : JPEG, PNG, WebP.";
            }
        }
    } elseif ($_FILES["image"]["error"] !== UPLOAD_ERR_NO_FILE) {
        $message = "Erreur lors de l'upload de l'image. Code d'erreur : " . $_FILES["image"]["error"];
    }

    if (!empty($title) && !empty($description) && !empty($content) && $category_id && empty($message)) {
        $articleId = insertArticle($title, $description, $content, $category_id, $user_id, $img_cover);

        if ($articleId) {
            header("Location: article.php?id=" . $articleId);
            exit;
        } else {
            $message = "Erreur lors de l'insertion de l'article.";
        }
    } elseif (empty($message)) {
        $message = "Tous les champs doivent être remplis.";
    }
}
?>

<main class="flex flex-column align-item-center gap-100">
    <section class="create-container flex flex-column gap-10">
        <form class="flex flex-column gap-20" method="POST" action="" enctype="multipart/form-data">
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
                    <input type="file" id="image" name="image" accept="image/jpeg, image/png, image/webp">
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
            <?php if (!empty($message)) : ?>
                <p style="color: red; font-size:0.75rem;"><?php echo $message ?></p>
            <?php endif; ?>
            <button type="submit" class="btn-primary">Envoyer</button>
        </form>
    </section>
</main>

<?php include_once "../components/footer.php"; ?>