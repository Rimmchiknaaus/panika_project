<?php

?>
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
        <section id="contact">
        <h2><?=$language['contact_title']?></h2>
        <div id="map">
    <script>
            var map = L.map('map').setView([43.33205, 5.35000], 5);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            var marker = L.marker([42.641653, 8.9381714]).addTo(map);
            marker.bindPopup("<strong>[PORT] IRS</strong> - Port de Ile Rousse");
        </script>
    </div>
    </section>
</main>
