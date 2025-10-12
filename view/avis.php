<section>
    <div class="section__header">
    <h2 class="section__title"><?= $language['nav_galerie'] ?></h2>
    </div>
    <h3><?= $language['comment_add_title'] ?></h3>
    <?php if (!empty($_SESSION['user'])): ?>
        <form action="/ctrl/commentaire-add.php?lang=<?= $lang ?>" method="post">
            <input type="hidden" name="lang" value="<?= htmlspecialchars($lang) ?>">
            <input type="hidden" name="idArticle" value="<?= $_GET['id'] ?>">
            <textarea name="contenu" rows="4" required placeholder="<?= $language['comment_placeholder'] ?>"></textarea><br><br>
            <button type="submit"><?= $language['btn_send'] ?></button>
        </form>
    <?php else: ?>
        <p><?= $language['comment_auth_required'] ?></p>
        <a class="btn-commentaire" href="/ctrl/login-display.php?lang=<?= $lang ?>"><?= $language['btn_login'] ?></a>
    <?php endif ?>

</section>
