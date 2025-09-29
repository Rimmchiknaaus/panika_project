<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/service.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/gallery.php';

use App\Ctrl\Ctrl;
use App\Model\Lib\Service\Service as LibService;
use App\Model\Lib\Gallery\Gallery as LibGallery;


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
        $lang = $_SESSION['lang'] ?? 'fr';

        $listCategorie = LibService::readAllCategorie($lang);
        $this->addViewArg('listCategorie', $listCategorie);

        $listPhoto = LibGallery::readAllPhoto($lang);
        $this->addViewArg('listPhoto', $listPhoto);
    }
}

// Exécute le Controlleur
$ctrl = new homeDisplay();
$ctrl->execute();
