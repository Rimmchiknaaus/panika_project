<?php

namespace App\Model\Lib\Gallery;

require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/bdd.php';

use PDO;
use  App\Model\Lib\BDD as LibBdd;


class Gallery
{

public static function readAllPhoto(string $lang = 'fr') 
    {
        $libelleCol = $lang . '_libelle';
        // Prépare la requête
        $query = "SELECT galerie.id, galerie.image, galerie.created_at, categorie.$libelleCol AS libelle FROM galerie  INNER JOIN categorie ON galerie.idCategorie = categorie.id";
        $statement = LibBdd::connect()->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}