<?php
$prestation = $args['prestation'];
?>

<section>
<div class="section__header">
            <h2 class="section__title"><?= $language['prestation-update']?></h2>
            </div>
    <form class="form"method="POST" action="/ctrl/prestation-update.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($prestation['id']) ?>">
            <input class="form__item" type="text" name="fr_libelle" value="<?= htmlspecialchars($prestation['fr_libelle'] ?? '') ?>" placeholder="<?= $prestation['fr_libelle'] ?>"><br>
            <input class="form__item" type="text" name="ru_libelle" value="<?= htmlspecialchars($prestation['ru_libelle'] ?? '') ?>"placeholder="<?= $prestation['ru_libelle'] ?>"><br>
            <select class="form__item" name="idCategorie" placeholder="<?= $prestation['idCategorie'] ?>">
            <?php foreach ($args['listCategorie'] as $c){ ?>
                <option value="<?= $c['id'] ?>"><?= $c['libelle'] ?></option>
                <?php } ?>
            </select><br>
            <input class="form__item" type="number" step="10" name="prix"  value="<?= htmlspecialchars ($prestation['prix']) ?>" placeholder="<?= $prestation['prix'] ?>"><br>
            <input class="form__item" type="number" name="duree"  value="<?= htmlspecialchars($prestation['duree'])?>" placeholder="<?=$prestation['duree']?>"><br>
                <div class="form__checkbox">
                    <label for="actif"><?= $language['actif'] ?></label>
                    <input class="form__item" type="checkbox" name="actif" value="1" checked>
                </div>
            <div class="btn__admin">
                <button class="btn__admin_item" type="submit"><?= $language['add_btn'] ?></button>
                <a href="/ctrl/prestation-list.php?id=<?= $p['id'] ?>&lang=<?= $lang ?>" class="btn__admin_item" type="submit"><?= $language['annuler_btn'] ?></a>
            </div>
        </form>
</section>
        
