
<main>
<?php if (isset($_SESSION['user']) && ($_SESSION['user']['role'] === 'admin')){ ?>
    <a href="/ctrl/prestation-add-display.php"><?= $language['prestation-add_btn']?></a>
    <?php } ?>
    <section class="categorie">
            <div class="section__header">
                <h2 class="section__title"><?= $language['h2_prestations']?></h2>
                <h3 class="section__subtitle"><?= $language['service_subtitle']?></h3>
            </div>
            <div class="categorie__list">
            <?php foreach ($args['listCategorie'] as $categorie){ ?>
                <div class="categorie__card">
                    <div class="prestation__list">
                    <p class="categorie__libelle"><?= $categorie['libelle'] ?></p>
                        <?php foreach ($categorie['prestations'] as $p){ ?>
                                <p class="preastation__text"><?= $p['libelle'] ?></p>
                                <p class="preastation__duree"><?= $p['duree'] ?>min</p>
                                <p class="preastation__prix"><?= $p['prix'] ?>€</p>
                        <?php } ?>
                    </div>
                    <div class="categorie__img">
                        <img src="<?= $categorie['image'] ?>" alt="<?= $categorie['libelle'] ?>">
                    </div>
                </div>
            <?php } ?>
            </div>
            <div class="btn__group">
                <a  href="rdv.html" class="btn__rdv"><?= $language['rdv_button']?></a>         
            </div>
        </section>
</main>