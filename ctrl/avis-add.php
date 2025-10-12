<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/avis.php';

use App\Ctrl\Ctrl;
use App\Model\Lib\Avis\Avis as LibAvis;

/** Montre le forme pour ajouter des prestations. */
class avisAdd extends Ctrl
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
        $idUtilisateur = $_SESSION['user']['id'];
        $contenu = $_POST['contenu'];
        $lang = $_GET['lang'] ?? 'fr';

        require $_SERVER['DOCUMENT_ROOT'] . "/view/lang/lang.$lang.php";

        $this->addViewArg('lang', $lang);
        LibAvis::createAvis($idUtilisateur, $contenu);
        
        $this->redirectTo('/ctrl/avis.php?lang=' . $lang);

    }
}

// Exécute le Controlleur
$ctrl = new avisAdd();
$ctrl->execute();