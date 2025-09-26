<h2><?= $language['register_title'] ?></h2>

<?php if (!empty($_SESSION['msg'])): ?>
    <div>
        <?php foreach ($_SESSION['msg'] as $type => $message): ?>
            <p style="color: <?= $type === 'success' ? 'green' : 'red' ?>">
                <?= htmlspecialchars($message) ?>
            </p>
        <?php endforeach; ?>
        <?php unset($_SESSION['msg']); ?>
    </div>
<?php endif; ?>

<form method="POST" action="/ctrl/register.php">
    <label><?= $language['label_firstname'] ?> :</label><br>
    <input type="text" name="myName" required><br><br>

    <label><?= $language['label_lastname'] ?> :</label><br>
    <input type="text" name="myFirstname" required><br><br>

    <label>Email :</label><br>
    <input type="email" name="myEmail" required><br><br>

    <label><?= $language['label_phone'] ?> :</label><br>
    <input type="tel" name="myPhone" pattern="[0-9]{10}" placeholder="0601020304" required><br><br>

    <label><?= $language['label_new_password'] ?> :</label><br>
    <input type="password" name="myPassword" id="myPassword" required>
    <button type="button" onclick="togglePassword('myPassword')">👁</button><br><br>

    <label><?= $language['label_confirm_password'] ?> :</label><br>
    <input type="password" name="myPasswordRepeat" id="myPasswordRepeat" required>
    <button type="button" onclick="togglePassword('myPasswordRepeat')">👁</button><br><br>

    <button type="submit"><?= $language['signup_button'] ?></button>
</form>

<script>
function togglePassword(id) {
    const field = document.getElementById(id);
    field.type = field.type === 'password' ? 'text' : 'password';
}
</script>
