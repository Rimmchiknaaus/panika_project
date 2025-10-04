<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/service.php';

use App\Ctrl\Ctrl;
use App\Model\Lib\Service\Service as LibService;

/** Montre le forme pour ajouter des prestations. */
class prestationUpdate extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return null;
    }
    /** @Override */
    public function getViewFile(): ?string
    {
        return null;
    }

    /** @Override */
    public function do(): void
    {
        $lang =  $_POST['lang'];
        $id =  $_POST['id'];
        $idCategorie = $_POST['idCategorie'];
        $frLibelle = $_POST['fr_libelle'];
        $ruLibelle = $_POST['ru_libelle'];
        $prix = $_POST['prix'];
        $duree = $_POST['duree'];
        $actif = isset($_POST['actif']) ? 1 : 0;

        LibService::updatePrestation($id, $idCategorie, $frLibelle, $ruLibelle, $prix, $duree, $actif);

        $this->redirectTo('/ctrl/prestation-list.php?lang=' . $lang);
    }
}

// Exécute le Controlleur
$ctrl = new prestationUpdate();
$ctrl->execute();