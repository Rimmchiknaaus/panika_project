<section>
    <div class="section__header">
        <h2 class="section__title"><?= $language['register_title'] ?></h2>
    </div>

    <form class="form" method="POST" action="/ctrl/register.php">
        <input class="form__item" type="text" name="myName" placeholder="<?= $language['label_firstname']?>"required><br>
        <input class="form__item" type="text" name="myFirstname" placeholder="<?= $language['label_lastname']?>" required><br>

        <input class="form__item" type="email" name="myEmail" placeholder="Email" required><br>
        <input class="form__item" type="tel" name="myPhone" pattern="[0-9]{10}" placeholder="<?= $language['label_phone'] ?>" required><br>

        <div class="pass__group">
            <input class="form__item" type="password" name="myPassword" id="myPassword" placeholder="<?= $language['label_new_password'] ?>" required>
            <button type="button" onclick="togglePassword('myPassword')">👁</button><br>
        </div>
        <br>
        <div class="pass__group">
            <input class="form__item" type="password" name="myPasswordRepeat" id="myPasswordRepeat" placeholder="<?= $language['label_confirm_password'] ?>"required>
            <button type="button" onclick="togglePassword('myPasswordRepeat')">👁</button>
        </div>
        <div class="btn__group">
            <button class="btn__client" type="submit"><?= $language['signup_button'] ?></button>
        </div>
    </form>
</section>

<script>
function togglePassword(id) {
    const field = document.getElementById(id);
    field.type = field.type === 'password' ? 'text' : 'password';
}
</script>
