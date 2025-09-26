<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/service.php';

use App\Ctrl\Ctrl;
use App\Model\Lib\Service\Service as LibService;

/** Montre le forme pour ajouter des prestations. */
class prestationList extends Ctrl
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
        $fr_libelle = $_POST['fr_libelle'];
        $ru_libelle = $_POST['ru_libelle'];
        $idCategorie = $_POST['idCategorie'] ?? null;
        $prix =  $_POST['prix'];
        $duree =  $_POST['duree'];
        $actif = isset($_POST['actif']) ? 1 : 0;

        LibService::createService($idCategorie, $fr_libelle, $ru_libelle,  $prix, $duree, $actif);

        $this->redirectTo('/ctrl/prestation-list.php');
    }
}

// Exécute le Controlleur
$ctrl = new prestationList();
$ctrl->execute();