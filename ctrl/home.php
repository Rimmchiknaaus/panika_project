<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/service.php';

use App\Ctrl\Ctrl;
use App\Model\Lib\Service\Service as LibService;


class homeDisplay extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return "Accueil";
    }

    /** @Override */
    public function getViewFile(): ?string
    {
        return  '/view/home.php';
    }

    /** @Override */
    public function do(): void
    {
        $listCategorie = LibService::readAllCategorie();
        $this->addViewArg('listCategorie', $listCategorie);
    }
}

// Exécute le Controlleur
$ctrl = new homeDisplay();
$ctrl->execute();
