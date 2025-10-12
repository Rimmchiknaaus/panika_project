<?php

namespace App\Model\Lib\Gallery;

require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/bdd.php';

use PDO;
use  App\Model\Lib\BDD as LibBdd;


class Gallery
{

    public static function readAllPhoto(string $lang = 'fr'): ?array
    {
        $libelleCol = $lang . '_libelle';
    
        $query = "SELECT galerie.id, galerie.idCategorie, galerie.image, categorie.$libelleCol AS libelle";
        $query .= ' FROM galerie';
        $query .= ' INNER JOIN categorie ON galerie.idCategorie = categorie.id';
        $query .= ' ORDER BY galerie.created_at DESC';
    
        $statement = LibBdd::connect()->prepare($query);
        $statement->execute();
    
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function createPhoto($idCategorie, string $imagePath): bool
        {
            $query = "INSERT INTO galerie (idCategorie, image) VALUES (:idCategorie, :image)";
            
            $statement = LibBdd::connect()->prepare($query);
            $statement->bindParam(':idCategorie', $idCategorie);
            $statement->bindParam(':image', $imagePath);
        
            return $statement->execute();
        }  

        public static function deletePhoto(int $id): bool
        {
            $db = LibBdd::connect(); 
            $db->beginTransaction();

            $query = 'DELETE FROM galerie WHERE id = :id';
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $db->commit();
            return true;
    }
    public static function getPhotoByCategorie(int $categorieId, string $lang = 'fr'): array
    {
        $libelleCol = $lang . '_libelle';

        $query = "SELECT galerie.id, galerie.idCategorie, galerie.image, categorie.$libelleCol AS libelle";
        $query .= ' FROM galerie';
        $query .= ' INNER JOIN categorie ON galerie.idCategorie = categorie.id';
        $query .= ' WHERE categorie.id = :categorieId';
        $query .= ' ORDER BY galerie.created_at DESC';

        $statement = LibBdd::connect()->prepare($query);
        $statement->bindParam(':categorieId', $categorieId, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

