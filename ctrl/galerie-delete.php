<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/service.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/gallery.php';

use App\Ctrl\Ctrl;
use App\Model\Lib\Service\Service as LibService;
use App\Model\Lib\Gallery\Gallery as LibGallery;


class galerieDelete extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return  null;
    }

    /** @Override */
    public function getViewFile(): ?string
    {
        return  null;
    }

    /** @Override */
    public function do(): void
    {
        $lang = $_SESSION['lang'] ?? 'fr';
        $id = $_GET['id'];

        LibGallery::deletePhoto($id);

        $this->redirectTo('/ctrl/galerie.php?lang=' . $lang);



    }
}

// Exécute le Controlleur
$ctrl = new galerieDelete();
$ctrl->execute();
