<form class="flex flex-column gap-5" method="POST" action="">
    <input type="hidden" name="articleId" value="<?= $article['id'] ?>">
    <div class="flex flex-column gap-10">
        <div>
            <label for="username"></label>
            <input class="form-input" type="text" id="username" name="username" placeholder="Pseudo" maxlength="50"
                pattern="[A-Za-z0-9 ]+" autocomplete="off" required>
        </div>
        <div>
            <label for="content"></label>
            <textarea class="form-input" id="content" name="content" rows="4" placeholder="Votre commentaire..."
                required></textarea>
        </div>
    </div>
    <button type="submit" class="btn-primary">Envoyer</button>
</form>