<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/service.php';

use App\Ctrl\Ctrl;
use App\Model\Lib\Service\Service as LibService;

/** Montre le forme pour ajouter des prestations. */
class prestationUpdateDisplay extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        $lang = $_SESSION['lang'] ?? 'fr';
        return $lang === 'ru' ? 'Изменить услугу' : 'Modifier prestation';
    }
    /** @Override */
    public function getViewFile(): ?string
    {
        return '/view/prestation-update.php';
    }

    /** @Override */
    public function do(): void
    {

        $id = $_GET ['id'];   
        $lang = $_GET['lang'] ?? 'fr';
        $prestation = LibService::getPrestation($id, $lang);
        require $_SERVER['DOCUMENT_ROOT'] . "/view/lang/lang.$lang.php";
        
        $listCategorie = LibService::readAllCategorie();
        $this->addViewArg('lang', $lang);
        $this->addViewArg('listCategorie', $listCategorie);
        $this->addViewArg('prestation', $prestation);
    }
}

// Exécute le Controlleur
$ctrl = new prestationUpdateDisplay();
$ctrl->execute();