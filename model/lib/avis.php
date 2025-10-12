<?php

namespace App\Model\Lib\Avis;

require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/bdd.php';

use PDO;
use  App\Model\Lib\BDD as LibBdd;


class Avis
{

    public static function readAllAvis(): ?array
    {
        $query = '  SELECT avis.id, avis.idUtilisateur, avis.contenu, avis.created_at, avis.updated_at, utilisateur.prenom AS client';
        $query .= ' FROM avis';
        $query .= ' JOIN utilisateur ON avis.idUtilisateur = utilisateur.id';
        $query .= ' ORDER BY avis.created_at DESC';
        $statement = LibBdd::connect()->prepare($query);
        $statement->execute();
    
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function createAvis($idUtilisateur, $contenu): bool
    {
        $query = '  INSERT INTO avis(idUtilisateur, contenu) VALUES(:idUtilisateur, :contenu)';
        $statement = LibBdd::connect()->prepare($query);
        $statement->bindParam(':idUtilisateur', $idUtilisateur, PDO::PARAM_INT);
        $statement->bindParam(':contenu', $contenu, PDO::PARAM_STR);

        $successOrFailure = $statement->execute();

        return $successOrFailure;
    }

    public static function getAvis($id):  ?array
    {
        $query = '  SELECT avis.id, avis.idUtilisateur, avis.contenu, avis.created_at, avis.updated_at,utilisateur.prenom AS client';
        $query .= ' FROM avis';
        $query .= ' WHERE avis.id = :id';
        $statement = LibBdd::connect()->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateAvis(int $id, string $contenu):  bool
    {
        $query = '  UPDATE avis';
        $query .= ' SET ';
        $query .= ' avis.contenu = :contenu ';
        $query .= ' WHERE avis.id = :id';
        $statement = LibBdd::connect()->prepare($query);
        $statement->bindParam(':contenu', $contenu);
        $statement->bindParam(':id', $id);


        $successOrFailure = $statement->execute();

        return $successOrFailure;
    }
    public static function deleteAvis(int $id):  bool
    {
        $query = '  DELETE FROM avis';
        $query .= ' WHERE avis.id = :id';
        $statement = LibBdd::connect()->prepare($query);
        $statement->bindParam(':id', $id);


        $successOrFailure = $statement->execute();

        return $successOrFailure;
    }
}

