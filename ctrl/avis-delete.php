<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/avis.php';

use App\Ctrl\Ctrl;
use App\Model\Lib\Avis\Avis as LibAvis;

/** Montre le forme pour ajouter des prestations. */
class avisDelete extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        $lang = $_SESSION['lang'] ?? 'fr';
        return $lang === 'ru' ? 'Отзывы о нас' : 'Avis';
    }
    /** @Override */
    public function getViewFile(): ?string
    {
        return '/view/avis.php';
    }

    /** @Override */
    public function do(): void
    {

        $id = $_GET['id'];
        $lang = $_GET['lang'] ?? 'fr';

        require $_SERVER['DOCUMENT_ROOT'] . "/view/lang/lang.$lang.php";

        $this->addViewArg('lang', $lang);
        $this->addViewArg('language', $language);

        LibAvis::deleteAvis($id);
        
        $this->redirectTo('/ctrl/avis.php?php?lang=' . $lang);
    }
}

// Exécute le Controlleur
$ctrl = new avisDelete();
$ctrl->execute();