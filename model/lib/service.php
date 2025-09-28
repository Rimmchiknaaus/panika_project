<?php

namespace App\Model\Lib\Service;

require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/bdd.php';

use PDO;
use  App\Model\Lib\BDD as LibBdd;


class Service
{

public static function getService(string $email) 
    {
        // Prépare la requête
        $query = '  SELECT utilisateur.id, utilisateur.prenom, utilisateur.nom, utilisateur.email, utilisateur.phone, utilisateur.password, utilisateur.hashedPassword, utilisateur.role';
        $query .= ' FROM utilisateur';
        $query .= ' WHERE utilisateur.email = :email';
        $statement = LibBdd::connect()->prepare($query);
        $statement->bindParam(':email', $email);

        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public static function createService($idCategorie, $fr_libelle, $ru_libelle,  $prix, $duree, $actif): bool
    {
        $query = '  INSERT INTO prestation(idCategorie, fr_libelle, ru_libelle, prix, duree, actif) VALUES(:idCategorie, :fr_libelle, :ru_libelle, :prix, :duree, :actif)';
        $statement = LibBdd::connect()->prepare($query);
        $statement->bindParam(':idCategorie', $idCategorie);
        $statement->bindParam(':fr_libelle', $fr_libelle);
        $statement->bindParam(':ru_libelle', $ru_libelle);
        $statement->bindParam(':prix', $prix);
        $statement->bindParam(':duree', $duree);
        $statement->bindParam(':actif', $actif);

        $successOrFailure = $statement->execute();

        return $successOrFailure;
    }   
    
public static function updateUser($id, $prenom, $nom, $email, $phone,  $password, $hashedPassword): bool
    {
        // Prépare la requête
        // NOTE la requête a des paramètres !
        // NOTE il faut utiliser 'bindParam' pour 'faire le lien' entre, par exemple, le 'paramètre nommé' ':label' dans la requête, et la variable passée en paramètre de la fonction $label
        $query = '  UPDATE utilisateur';
        $query.= '  SET';
        $query.= '  utilisateur.prenom = :prenom';
        $query.= '  ,utilisateur.nom = :nom';
        $query.= '  ,utilisateur.email = :email';
        $query.= '  ,utilisateur.phone = :phone';
        $query.= '  ,utilisateur.password = :password';
        $query.= '  ,utilisateur.hashedPassword = :hashedPassword';
        $query.= '  WHERE utilisateur.id = :id';
        $statement = LibBdd::connect()->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':prenom', $prenom);
        $statement->bindParam(':nom', $nom);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':phone', $phone);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':hashedPassword', $hashedPassword);

        $successOrFailure = $statement->execute();

        return $successOrFailure;
}

public static function readAllCategorie(string $lang = 'fr'): ?array
{
    $libelleCol = $lang . '_libelle';

    $query = "SELECT categorie.id, categorie." . $libelleCol . " AS libelle FROM categorie";

    $statement = LibBdd::connect()->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
}