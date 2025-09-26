<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/service.php';

use App\Ctrl\Ctrl;

/** Montre le forme pour ajouter des question. */
class prestationList extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return "Nos prestations";
    }

    /** @Override */
    public function getViewFile(): ?string
    {
        return  '/view/prestation-list.php';
    }

    /** @Override */
    public function do(): void
    {
        
    }
}

// Exécute le Controlleur
$ctrl = new prestationList();
$ctrl->execute();