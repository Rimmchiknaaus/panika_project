<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/service.php';

use App\Ctrl\Ctrl;
use App\Model\Lib\Service\Service as LibService;

/** Montre le forme pour ajouter des question. */
class prestationDelete extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return null;
    }

    /** @Override */
    public function getViewFile(): ?string
    {
        return  null;
    }

    /** @Override */
    public function do(): void
    {
        $id = $_GET['id'];
        $lang = $_GET['lang'] ?? 'fr';

        LibService::deletePrestation($id);

        $this->redirectTo('/ctrl/prestation-list.php?lang=' . $lang);
    }
}

// Exécute le Controlleur
$ctrl = new prestationDelete();
$ctrl->execute();