<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/service.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/gallery.php';

use App\Ctrl\Ctrl;
use App\Model\Lib\Service\Service as LibService;
use App\Model\Lib\Gallery\Gallery as LibGallery;


class galerieAdd extends Ctrl
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
        $lang = $_SESSION['lang'] ?? 'fr';
        $idCategorie = $_POST['idCategorie'];
        $imageFile = $_FILES['image'];
        $imageName = uniqid() . '_' . basename($imageFile['name']);
        $imagePath = '/img/' . $imageName;
        move_uploaded_file($imageFile['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $imagePath);


        LibGallery::createPhoto($idCategorie, $imagePath);
        $listCategorie = LibService::readAllCategorie($lang);
        $this->addViewArg('listCategorie', $listCategorie);
        $listPhoto = LibGallery::readAllPhoto($lang);
        $this->addViewArg('listPhoto', $listPhoto);

        $this->redirectTo('/ctrl/galerie.php?lang=' . $lang);
    }
}

// Exécute le Controlleur
$ctrl = new galerieAdd();
$ctrl->execute();
