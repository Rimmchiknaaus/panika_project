<section>
    <div class="section__header">
        <h2 class="section__title"><?= $language['nav_avis'] ?></h2>
    </div>
<div class="form">
    <h3><?= $language['avis_add_title'] ?></h3>
    <?php if (!empty($_SESSION['user'])): ?>
        <form action="/ctrl/avis-add.php?lang=<?= $lang ?>" method="post">
            <input type="hidden" name="lang" value="<?= htmlspecialchars($lang) ?>">
            <textarea name="contenu" rows="4" required placeholder="<?= $language['avis_placeholder'] ?>"></textarea><br><br>
            <button class="btn__client" type="submit"><?= $language['btn_send'] ?></button>
            <a class="btn__client" href="/ctrl/avis.php?lang=<?= $lang ?>"><?= $language['annuler_btn'] ?></a>
        </form>
    <?php else: ?>
        <p class="notification"><?= $language['avis_auth_required'] ?></p>
        <div class="btn__group">
            <a class="btn__client" href="/ctrl/login-display.php?lang=<?= $lang ?>"><?= $language['nav_login'] ?></a>
        </div>
    <?php endif ?>
</div>
<div class="avis">
    <h3><?= $language['avis_list_title'] ?></h3>
    <?php $editCommentId = $_GET['editCommentaire'] ?? null; ?>
    <?php foreach ($args['avisList'] as $avis){ ?>
        <div class="avis__list">
            <strong class="avis__client"><?= $avis['client'] ?></strong>
            <?php if ($avis['updated_at']){ ?>
                <em><span><?= $language['avis_updated'] ?> </span><?= date('d/m/Y H:i', strtotime($avis['updated_at'])) ?></em>
            <?php } ?>
            <?php if (!$avis['updated_at']){ ?>
                <em><span></span><?= date('d/m/Y H:i', strtotime($avis['created_at'])) ?></em>
            <?php } ?>
            <?php if (isset($_GET['replyAvis']) && $_GET['replyAvis'] == $avis['id'] && $_SESSION['user']['role'] === 'admin') {?>
            <form class="form" action="/ctrl/commentaire-add.php" method="post">
                <input type="hidden" name="idAvis" value="<?= $avis['id'] ?>">
                <input type="hidden" name="lang" value="<?= htmlspecialchars($lang) ?>">
                <textarea name="contenu" rows="3" required></textarea><br>
                <div class="btn__group">
                    <button class="btn__client" type="submit"><?= $language['btn_send'] ?></button>
                    <a class="btn__client" href="/ctrl/avis.php?lang=<?= $lang ?>"><?= $language['annuler_btn'] ?></a>
                </div>
            </form>
    <?php } ?>
            <?php if ($editCommentId == $avis['id']){ ?>
                <form class="form" action="/ctrl/avis-update.php" method="post">
                    <input type="hidden" name="lang" value="<?= htmlspecialchars($lang) ?>">
                    <input type="hidden" name="id" value="<?= $avis['id'] ?>">
                    <textarea name="contenu" rows="4" required><?= htmlspecialchars($avis['contenu']) ?></textarea><br>
                    <button type="submit"><?= $language['add_btn'] ?></button>
                    <a class="btn__client" href="/ctrl/avis.php?lang=<?= $lang ?>"><?= $language['annuler_btn'] ?></a>
                </form>
            <?php } else { ?>
                <p><?= nl2br(htmlspecialchars($avis['contenu'])) ?></p>
            <?php } ?>
            <div class="avis__actions">
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $avis['idUtilisateur']){ ?>
                    <div class="btn__group">
                        <a href="/ctrl/avis.php?editCommentaire=<?= $avis['id'] ?>&lang=<?= $lang ?>" class="btn__client"><?= $language['update_btn'] ?></a>
                        <a href="/ctrl/avis-delete.php?id=<?= $avis['id'] ?>&lang=<?= $lang ?>" class="btn__client" onclick="return confirm('<?= $language['avis_delete_confirm'] ?>')"><?= $language['delete_btn'] ?></a>
                    </div>
                <?php } ?>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'){ ?>
                    <div class="btn__admin">
                        <a href="/ctrl/avis.php?replyAvis=<?= $avis['id'] ?>&lang=<?= $lang ?>" class="btn__admin_item"><?= $language['answer_btn'] ?></a>
                        <a href="/ctrl/avis-delete.php?id=<?= $avis['id'] ?>&lang=<?= $lang ?>" class="btn__admin_item" onclick="return confirm('<?= $language['avis_delete_confirm'] ?>')"><?= $language['delete_btn'] ?></a>
                    </div>
                <?php } ?>
            </div>
            <?php if (!empty($avis['commentaires'])){ ?>
                <div class="avis__commentaires">
                    <?php foreach ($avis['commentaires'] as $commentaire){ ?>
                        <div class="avis__comment">
                            <strong class="notification">Admin:</strong> 
                            <p><?= nl2br(htmlspecialchars($commentaire['contenu'])) ?></p>
                            <?php if ($commentaire['updated_at']){ ?>
                                <em><span><?= $language['avis_updated'] ?> </span><?= date('d/m/Y H:i', strtotime($commentaire['updated_at'])) ?></em>
                            <?php } ?>
                            <?php if (!$commentaire['updated_at']){ ?>
                                <em><span></span><?= date('d/m/Y H:i', strtotime($commentaire['created_at'])) ?></em>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'){ ?>
                    <div class="btn__admin">
                        <a href="/ctrl/commentaire-delete.php?id=<?= $commentaire['id'] ?>&lang=<?= $lang ?>" class="btn__admin_item" onclick="return confirm('<?= $language['avis_delete_confirm'] ?>')"><?= $language['delete_btn'] ?></a>
                    </div>
                <?php } ?>
                </div>
            <?php } ?>
        </div>
        <?php } ?>
    <?php if (empty($args['avisList'])){ ?>
        <p><?= $language['avis_none'] ?></p>
    <?php } ?>
</div>
</section>
