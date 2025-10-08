<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/auth.php';

use App\Ctrl\Ctrl;
use App\Model\Lib\Auth; 

/** Montre le forme pour ajouter des question. */
class logoutUser extends Ctrl
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

        unset($_SESSION['user']);

        if (!empty($_GET['redirect'])) {
            header('Location: ' . $_GET['redirect']);
            exit;
        }
        header('Location: /ctrl/home.php');
        exit;
    }
}

// Exécute le Controlleur
$ctrl = new logoutUser();
$ctrl->execute();



