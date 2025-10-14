<?php

namespace App\Model\Lib\Service;

require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/bdd.php';

use PDO;
use  App\Model\Lib\BDD as LibBdd;


class Service
{

    public static function readAllPrestation(string $lang = 'fr'): array
        {
            $libelleCol = $lang . '_libelle';

            $query = "SELECT prestation.id, prestation.idCategorie, prestation.$libelleCol AS libelle, article.prix, article.duree, article.actif";
            $query .= ' FROM prestation';
            $query .= ' JOIN categorie ON prestation.idCategorie = categorie.id';
            $statement = LibBdd::connect()->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function createPrestation($idCategorie, $frLibelle, $ruLibelle, $prix, $duree, $actif): bool
        {
            $query = "INSERT INTO prestation (idCategorie, fr_libelle, ru_libelle, prix, duree, actif) VALUES (:idCategorie, :frLibelle, :ruLibelle, :prix, :duree, :actif)";
            
            $statement = LibBdd::connect()->prepare($query);
            $statement->bindParam(':idCategorie', $idCategorie);
            $statement->bindParam(':frLibelle', $frLibelle);
            $statement->bindParam(':ruLibelle', $ruLibelle);
            $statement->bindParam(':prix', $prix);
            $statement->bindParam(':duree', $duree);
            $statement->bindParam(':actif', $actif);
        
            return $statement->execute();
        }   
    
        public static function updatePrestation($id, $idCategorie, $fr_libelle, $ru_libelle, $prix, $duree, $actif): bool
    {
            $query = "UPDATE prestation SET idCategorie = :idCategorie, fr_libelle = :fr_libelle, ru_libelle = :ru_libelle, prix = :prix, duree = :duree, actif = :actif WHERE id = :id";

            $statement = LibBdd::connect()->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->bindParam(':idCategorie', $idCategorie, PDO::PARAM_INT);
            $statement->bindParam(':fr_libelle', $fr_libelle);
            $statement->bindParam(':ru_libelle', $ru_libelle);
            $statement->bindParam(':prix', $prix);
            $statement->bindParam(':duree', $duree);
            $statement->bindParam(':actif', $actif, PDO::PARAM_BOOL);

            return $statement->execute();
}


    public static function deletePrestation(int $id): bool
        {
            $db = LibBdd::connect(); 
            $db->beginTransaction();

            $query = 'DELETE FROM prestation WHERE id = :id';
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $db->commit();
            return true;
    }
    public static function getPrestation(int $id, string $lang = 'fr'): ?array
    {

        $query =  'SELECT prestation.id, prestation.idCategorie, prestation.fr_libelle, prestation.ru_libelle, prestation.prix, prestation.duree, prestation.actif';
        $query .= ' FROM prestation';
        $query .= ' JOIN categorie ON prestation.idCategorie = categorie.id';
        $query .= ' WHERE prestation.id = :id';
        $statement = LibBdd::connect()->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->execute();

        $prestation = $statement->fetch(PDO::FETCH_ASSOC);
        return $prestation;
    }
    public static function getPrestationByCategorie(int $idCategorie, string $lang = 'fr'): array
    {
        $libelleCol = $lang . '_libelle';

        $query = " SELECT prestation.id, prestation.idCategorie, prestation.$libelleCol AS libelle, prestation.prix, prestation.duree, prestation.actif, GROUP_CONCAT(DISTINCT prestataire.prenom SEPARATOR ', ') AS prestataires";
        $query .= ' FROM prestation';
        $query .= ' LEFT JOIN prestataire_categorie ON prestataire_categorie.idCategorie = prestation.idCategorie';
        $query .= ' LEFT JOIN prestataire ON prestataire.id = prestataire_categorie.idPrestataire';
        $query .= ' JOIN categorie ON prestation.idCategorie = categorie.id';
        $query .= ' WHERE prestation.idCategorie = :idCategorie';
        $query .= ' GROUP BY prestation.id';

        $statement = LibBdd::connect()->prepare($query);
        $statement->bindParam(':idCategorie', $idCategorie, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function readAllCategorie(string $lang = 'fr'): ?array
        {
            $libelleCol = $lang . '_libelle';

            $query = "SELECT categorie.id, categorie.image, categorie.$libelleCol AS libelle FROM categorie";
            $statement = LibBdd::connect()->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
}
