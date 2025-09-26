
<main>
<?php if (isset($_SESSION['user']) && ($_SESSION['user']['role'] === 'admin')){ ?>
    <a href="/ctrl/prestation-add-display.php"><?= $language['prestation-add_btn']?></a>
    <?php } ?>
</main>