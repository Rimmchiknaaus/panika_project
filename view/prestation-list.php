
<main>
    
    <section class="categorie">
            <div class="section__header">
                <h2 class="section__title"><?= $language['h2_prestations']?></h2>
                <h3 class="section__subtitle"><?= $language['service_subtitle']?></h3>
            </div>
            <div class="categorie__list">
                <div class="btn__admin">
                <?php if (isset($_SESSION['user']) && ($_SESSION['user']['role'] === 'admin')){ ?>
                    <a href="/ctrl/prestation-add-display.php" class="btn__admin_item" ><?= $language['prestation-add_btn']?></a>
                <?php } ?>
                </div>
            <?php foreach ($args['listCategorie'] as $categorie){ ?>
                <div class="categorie__card">
                    <div class="prestation__list">
                    <p class="categorie__libelle"><?= $categorie['libelle'] ?></p>
                        <?php foreach ($categorie['prestations'] as $p){ ?>
                            <div class="prestation__card">
                                <div class="prestation">
                                    <div class="prestation__description">
                                        <a href="#" class="prestation__text"><?= $p['libelle'] ?></a>
                                        <p class="prestation__duree"><?= $p['duree'] ?>min</p>
                                    </div>
                                    <div class="prestation__prix">
                                        <p><?= $p['prix'] ?>€</p>
                                    </div>
                                </div>
                                    <?php if (isset($_SESSION['user']) && ($_SESSION['user']['role'] === 'admin')){ ?>
                                        <div class="btn__admin">
                                            <a href="/ctrl/prestation-update-display.php" class="btn__admin_item"><?= $language['prestation-update_btn']?></a>
                                            <a href="/ctrl/prestation-delete.php?id=<?= $p['id'] ?>&lang=<?= $lang ?>" class="btn__admin_item"><?= $language['prestation-delete_btn']?></a>     
                                        </div>
                                    <?php } ?>
                            </div>
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