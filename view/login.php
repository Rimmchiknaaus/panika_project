<section>
    <div class="section__header">
    <h2 class="section__title"><?= $language['nav_login'] ?></h2>
    </div>
    <form class="form"  method="POST" action="/ctrl/login.php">
        <input  class="form__item" type="email" name="email" placeholder="Email" required><br>
        <div class="pass__group">
            <input id="myPassword" class="form__item" type="password" name="password" placeholder="<?= $language['label_password'] ?>" required>
            <button type="button" onclick="togglePassword('myPassword')">👁</button>
        </div>
        <div class="btn__group">
            <button class="btn__rdv" type="submit"><?= $language['nav_login'] ?></button>
        </div>
    </form>
</section>
<script>
    function togglePassword(id) {
        const field = document.getElementById(id);
        field.type = field.type === 'password' ? 'text' : 'password';
    }
</script>