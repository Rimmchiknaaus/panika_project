<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $args['pageTitle'] ?? $pageTitle ?? '' ?></title>
    <link rel="stylesheet" href="/asset/css/style.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/node_modules/leaflet/dist/leaflet.css">
    <script src="/node_modules/leaflet/dist/leaflet.js"></script>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/view/lang/lang-init.php'; ?>
    <header>
        <nav class="navbar">
            <ul class="nav-left">
                <li><a class="logo" href="/index.php"><?= $language['site'] ?></a></li>
                <li>
                    <div class="language-link">
                        <a class="language-link-item" href="/ctrl/home.php?lang=ru"
                            <?php if($lang == 'ru'){?> style="color: #ff9900;" <?php } ?>>RU</a> | 
                        <a class="language-link-item" href="/ctrl/home.php?lang=fr"
                            <?php if($lang == 'fr'){?> style="color: #ff9900;" <?php } ?>>FR</a>    
                    </div>
                </li>
            </ul>

            <!-- Bouton burger pour les écrans mobiles -->
            <button class="burger" onclick="toggleMenu()">☰</button>  

            <!-- Liens de navigation -->
            <div class="nav-right" id="navLinks">
                <ul class="menu">
                    <li><a href="/home.php#contact"><?= $language['nav_contact'] ?></a></li>
                    <li><a href="/ctrl/rdv-display.php"><?= $language['nav_rdv'] ?></a></li>

                    <?php if (!empty($_SESSION['user'])): ?>
                        <li><a href="/ctrl/profile.php"><?= $language['nav_profile'] . ', ' . $_SESSION['user']['prenom'] ?>!</a></li>
                        <li><a href="/ctrl/logout.php"><?= $language['nav_logout'] ?></a></li>
                    <?php else: ?>
                        <li><a href="/ctrl/login-display.php"><?= $language['nav_login'] ?></a></li>
                        <li><a href="/ctrl/register-display.php"><?= $language['nav_register'] ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <script>
document.addEventListener('DOMContentLoaded', () => {
    const flashContainer = document.getElementById('flash-message');
    if (flashContainer) {
        setTimeout(() => {
            flashContainer.style.transition = 'opacity 0.5s ease';
            flashContainer.style.opacity = '0';
            setTimeout(() => {
                flashContainer.remove();
            }, 500);
        }, 5000); // auto-disparition après 5 sec
    }
});
function toggleMenu() {
    const menu = document.getElementById('navLinks');
    menu.classList.toggle('show');
}

</script>
</body>
</html>