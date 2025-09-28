<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/service.php';

use App\Ctrl\Ctrl;
use App\Model\Lib\Service\Service as LibService;

/** Montre le forme pour ajouter des prestations. */
class prestationAddDisplay extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return 'Nouvelle prestation';
    }
    /** @Override */
    public function getViewFile(): ?string
    {
        return '/view/prestation-add.php';
    }

    /** @Override */
    public function do(): void
    {

        $listCategorie = LibService::readAllCategorie();
        $this->addViewArg('listCategorie', $listCategorie);
    }
}

// Exécute le Controlleur
$ctrl = new prestationAddDisplay();
$ctrl->execute();