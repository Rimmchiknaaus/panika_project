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
                <button class="btn__admin_item" type="submit"><?= $language['annuler_btn'] ?></button>
            </div>
        </form>
    <?php } ?>
    <div class="filtre-categories" id="filtre">
    <button class="filtre-btn"><i class="fa fa-filter"></i></button>
        <div class="categorie-list" id="categorie-list">
            <?php foreach ($args['listCategorie'] as $c){ ?>
                <a class="btn__filtre" href="/ctrl/galerie.php?categorie=<?= $c['id'] ?>&lang=<?= $lang ?>"><?= $c['libelle'] ?></a>
            <?php } ?>
            <a class="btn__filtre"  href="/ctrl/galerie.php?lang=<?= $lang ?>" ><?= $language['filtre-categorie'] ?></a>
        </div>
    </div>
    <div class="gallery__block">
        <?php foreach ($args['listPhoto'] as $photo){ ?>
            <div class="gallery__block_item">
                <img data-src="<?= $photo['image'] ?>" alt="<?= $photo['libelle'] ?>" class="lazy">
                <?php if (isset($_SESSION['user']) && ($_SESSION['user']['role'] === 'admin')){ ?>
                    <div class="btn__admin">
                        <a href="/ctrl/galerie-delete.php?id=<?= $photo['id'] ?>&lang=<?= $lang ?>" class="btn__admin_item"><?= $language['delete_btn']?></a>          
                    </div>
                <?php } ?>      
            </div>
        <?php } ?>
    </div>
</section>
<script>
    const filtreBtn = document.querySelector('.filtre-btn');
    const categorieList = document.getElementById('categorie-list');

    filtreBtn?.addEventListener('click', () => {
    categorieList.classList.toggle('show');
    });
</script>

<script>
    const lazyImages = document.querySelectorAll("img.lazy");
    if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
        if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            img.classList.remove("lazy");
            obs.unobserve(img);
        }
        });
    });
    lazyImages.forEach(img => observer.observe(img));
    } else {
    // Chargement classique si IntersectionObserver n’est pas disponible
    lazyImages.forEach(img => {
        img.src = img.dataset.src;
        img.classList.remove("lazy");
    });
    }
</script>