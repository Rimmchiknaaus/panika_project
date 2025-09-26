<?php

namespace App\Model\Lib\Service;

require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/bdd.php';

use PDO;
use  App\Model\Lib\BDD as LibBdd;


class Service
{

public static function getUser(string $email) 
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

    public static function createUser($prenom, $nom, $email, $phone,  $password, $hashedPassword): bool
    {
        // Prépare la requête
        // NOTE la requête a des paramètres !
        // NOTE il faut utiliser 'bindParam' pour 'faire le lien' entre, par exemple, le 'paramètre nommé' ':label' dans la requête, et la variable passée en paramètre de la fonction $label
        $query = '  INSERT INTO utilisateur(prenom, nom, email, phone, password, hashedPassword) VALUES(:prenom, :nom, :email, :phone, :password, :hashedPassword)';
        $statement = LibBdd::connect()->prepare($query);
        $statement->bindParam(':prenom', $prenom);
        $statement->bindParam(':nom', $nom);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':phone', $phone);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':hashedPassword', $hashedPassword);



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
        $query.= '  WHERE user.id = :id';
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

}