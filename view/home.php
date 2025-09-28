<?php

?>
<main>
<section class="hero">
            <div class="hero__left">            
                <h1 class="hero__title">Espace de beauté PANIKA</h1>
                <div class="hero__text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
                <a class="btn__rdv" href="rdv.html">Prendre rendez-vous</a>
            </div>
            <div class="hero__right">
                <img src="/img/hero_1.png" alt="Espace de beauté PANIKA">
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
