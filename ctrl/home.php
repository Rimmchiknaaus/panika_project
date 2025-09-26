<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/auth.php';

use App\Ctrl\Ctrl;


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
        
    }
}

// Exécute le Controlleur
$ctrl = new homeDisplay();
$ctrl->execute();
