<?php

?>
<main>
    <section>
        <h2>Contenu de la SESSION</h2>
        <pre><?php var_dump($_SESSION) ?></pre>

        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ab, nisi ducimus totam dolore cum sit debitis sunt autem, exercitationem, minima modi sequi facere molestiae accusamus in maxime. Dolorem, labore!

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
