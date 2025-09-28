<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $args['pageTitle'] ?? $pageTitle ?? '' ?></title>
    <link rel="stylesheet" href="/asset/css/style.css">
        <link rel="stylesheet" href="/asset/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@600&family=Atkinson+Hyperlegible&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/node_modules/leaflet/dist/leaflet.css">
    <script src="/node_modules/leaflet/dist/leaflet.js"></script>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/view/lang/lang-init.php'; ?>
<header class="header">
    <div class="header__nav">

        <div class="header__left">
            <a class="header__nav_logo" href="/ctrl/home.php">
                <img src="/img/panika-logo.jpg" alt="Panika Espace de beauté logo">
            </a>

            <div class="language_link">
                <a class="language_link_item" href="<?= $_SERVER['PHP_SELF'] ?>?lang=ru"
                <?php if($lang == 'ru'){?> style="color: #6D6D6E;" <?php } ?>>RU</a> | 
                <a class="language_link_item" href="<?= $_SERVER['PHP_SELF'] ?>?lang=fr"
                <?php if($lang == 'fr'){?> style="color: #6D6D6E;" <?php } ?>>FR</a>    
            </div>

            <a class="btn__rdv" href="/ctrl/rdv-display.php">
                <?= $language['nav_rdv'] ?>
            </a>
        </div>

        <button class="burger" onclick="toggleMenu()"><i class="fa-solid fa-bars"></i></button>

        <nav class="header__nav_menu" id="main-nav">
            <ul>
                <li><a href="/ctrl/prestation-list.php"><?= $language['nav_services'] ?></a></li>
                <li><a href="/ctrl/galerie.php"><?= $language['nav_galerie'] ?></a></li>
                <li><a href="/ctrl/avis.php"><?= $language['nav_avis'] ?></a></li>
                <li><a href="/ctrl/home.php#contact"><?= $language['nav_contact'] ?></a></li>
                <li><a href="/ctrl/panier.php"><?= $language['nav_panier'] ?></a></li>

                <?php if (!empty($_SESSION['user'])): ?>
                    <li><a href="/ctrl/profile.php"><?= $language['nav_profile'] . ', ' . $_SESSION['user']['prenom'] ?>!</a></li>
                    <li><a href="/ctrl/logout.php"><?= $language['nav_logout'] ?></a></li>
                <?php else: ?>
                    <li><a href="/ctrl/login-display.php"><?= $language['nav_login'] ?></a></li>
                    <li><a href="/ctrl/register-display.php"><?= $language['nav_register'] ?></a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<script>
function toggleMenu() {
  const nav = document.getElementById('main-nav');
  nav.classList.toggle('show');
}
</script>
<script src="https://kit.fontawesome.com/026a02d0be.js" crossorigin="anonymous"></script>

</body>
</html>