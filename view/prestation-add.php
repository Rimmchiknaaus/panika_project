<form method="POST" action="/ctrl/prestation-add.php">
    <input type="text" name="fr_libelle" placeholder="<?= $language['prestation_fr_libelle'] ?>"><br>

    <input type="text" name="ru_libelle" placeholder="<?= $language['prestation_ru_libelle'] ?>"><br>

    <select name="idCategorie" placeholder="<?= $language['categorie'] ?>">
    <?php foreach ($args['listCategorie'] as $c){ ?>
        <option <?= $c['id'] ?>><?= $c['libelle'] ?></option>
        <?php } ?>

    </select><br>

    <input type="number" step="0.01" name="prix"  placeholder="<?= $language['prix'] ?>"><br>


    <input type="number" name="duree"  placeholder="<?= $language['duree'] ?>"><br>

    <input type="checkbox" name="actif" value="1" checked  placeholder="<?= $language['actif'] ?>"><br>

    <button type="submit"><?= $language['add_btn'] ?></button>
</form>
