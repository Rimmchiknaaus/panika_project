<main>
<section class="hero">
            <div class="hero__left">            
                <h1 class="hero__title">Espace de beauté PANIKA</h1>
                <div class="hero__text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
                <div class="btn__group">
                    <a class="btn__rdv" href="rdv.html"><?= $language['rdv_button']?></a>
                </div>
            </div>
            <div class="hero__right">
                <img src="/img/hero_1.png" alt="Espace de beauté PANIKA">
            </div>
</section>
<section class="services">
            <div class="section__header">
                <h2 class="section__title"><?= $language['h2_prestations']?></h2>
                <h3 class="section__subtitle"><?= $language['service_subtitle']?></h3>
            </div>
            <div class="services__list">
            <?php foreach ($args['listCategorie'] as $c){ ?>
                <div class="service__card">
                    <div class="service__img">
                        <img src="<?= $c['image'] ?>" alt="<?= $c['libelle'] ?>">
                        <p class="service__text"  <?= $c['id'] ?>><?= $c['libelle'] ?>
                        </p>
                    </div>
                </div>
            <?php } ?>
            </div>
            <div class="btn__group">
                <a  href="services.html" class="btn__voirPlus"><?= $language['vp_button']?></a>
                <a  href="rdv.html" class="btn__rdv"><?= $language['rdv_button']?></a>         
            </div>
        </section>
        <section class="gallery">
            <div class="section__header">
                <h2 class="section__title"><?= $language['h2_gallery']?></h2>
                <h3 class="section__subtitle"><?= $language['service_gallery']?></h3>
            </div>
            <div class="gallery__grid">
            <?php foreach ($args['listPhoto'] as $photo){ ?>
                <div class="gallery__item">
                    <img src="<?= $photo['image'] ?>" alt="<?= $photo['libelle'] ?>">
                </div>
                <?php } ?>
            </div>
            <div class="btn__group">
            <a href="services.html" class="btn__voirPlus"><?= $language['vp_button']?></a>
            </div>
        </section>    
    <!-- CONTACTS -->
    <section class="contacts">
        <div class="section__header">
            <h2 class="section__title"><?=$language['contact_title']?></h2>
            <p class="section__subtitle"><?=$language['contact_subtitle']?></p>
        </div>

        <div class="contacts__content">
            <div class="contacts__info">
            <p>1110 Avenue de la 2éme Division Blindée,<br>Les Angles (30133)</p>

            <p>
                <img src="src/public/icons/phone.svg" alt="Phone" class="contacts__icon">
                <a href="tel:+33766530044">+33 7 66 53 00 44</a>
            </p>

            <p>
                <img src="src/public/icons/instagram.svg" alt="Instagram" class="contacts__icon">
                <a href="https://www.instagram.com/panika_espace_de_beaute/" target="_blank">@panika_espace_de_beaute</a>
            </p>
            </div>

            <div class="contacts__map">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2889.525210751126!2d4.760387!3d43.951129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b5ef49fdfc5d41%3A0x2a59a5c43db2db02!2sLes%20Angles%2030133!5e0!3m2!1sfr!2sfr!4v0000000000000"
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        </section>
</main>
