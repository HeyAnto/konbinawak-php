<footer class="flex flex-column">
    <div class="style-foot"></div>
    <div class="foot-content flex flex-column align-item-center gap-10">
        <img src="/assets/images/utilities/logo.svg" alt="Mini Logo Konbinawak">
        <p style="text-align: center;">« Parce que la réalité est trop plate, on l'a réécrite. »</p>

        <?php if (isset($_SESSION["user_id"])) : ?>
            <a href="/pages/create-article.php">Créer un article</a>
        <?php endif; ?>

        <p>© <?php echo date("Y"); ?> Konbinawak</p>
    </div>
</footer>

</body>

<script src="/scripts/globals.js"></script>

</html>