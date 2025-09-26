
<h2><?= $language['nav_login'] ?></h2>

<?php if (!empty($_SESSION['msg'])): ?>
    <div>
        <?php foreach ($_SESSION['msg'] as $type => $message): ?>
            <p style="color: <?= $type === 'success' ? 'green' : 'red' ?>">
                <?= $message ?>
            </p>
        <?php endforeach; ?>
        <?php unset($_SESSION['msg']); ?>
    </div>
<?php endif; ?>

<form method="POST" action="/ctrl/login.php">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <button type="submit"><?= $language['nav_signup'] ?></button>
</form>