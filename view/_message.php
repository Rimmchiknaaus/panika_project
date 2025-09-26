<?php if (!empty($_SESSION['msg'])): ?>
    <div id="flash-message" class="flash-message">
        <?php foreach ($_SESSION['msg'] as $type => $message): ?>
            <div class="flash flash-<?= $type ?>">
                <?= htmlspecialchars($message) ?>
                <button class="flash-close" onclick="this.parentElement.remove()"> ×</button>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['msg']); ?>
    </div>
<?php endif; ?>




