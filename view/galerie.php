<section>
    <div class="section__header">
    <h2 class="section__title"><?= $language['nav_galerie'] ?></h2>
    </div>
    <?php if (isset($_SESSION['user']) && ($_SESSION['user']['role'] === 'admin')){ ?>
        <form class="form" method="POST" action="/ctrl/galerie-add.php" enctype="multipart/form-data">
        <input type="file" name="image" id="image" accept="image/*"><br><br>
        <select class="form__item" name="idCategorie" placeholder="<?= $language['categorie'] ?>">
            <?php foreach ($args['listCategorie'] as $c){ ?>
                <option value="<?= $c['id'] ?>"><?= $c['libelle'] ?></option>
            <?php } ?>
            </select><br>
            <div class="btn__admin">
                <button class="btn__admin_item" type="submit"><?= $language['add_btn'] ?></button>
            </div>
        </form>
    <?php } ?>
    <div class="gallery__block">
        <?php foreach ($args['listPhoto'] as $photo){ ?>
            <div class="gallery__block_item">
                <img src="<?= $photo['image'] ?>" alt="<?= $photo['libelle'] ?>">
                <?php if (isset($_SESSION['user']) && ($_SESSION['user']['role'] === 'admin')){ ?>
                    <div class="btn__admin">
                        <a href="/ctrl/galerie-delete.php?id=<?= $photo['id'] ?>&lang=<?= $lang ?>" class="btn__admin_item"><?= $language['delete_btn']?></a>          
                    </div>
                <?php } ?>      
            </div>
        <?php } ?>
    </div>
</section>

