<?php

namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\Repository\DatabaseConnection;
use App\Covoiturage\Model\DataObject\Voiture;

class VoitureRepository {

    public static function getVoitures() : array {

        $voitures = [];
        $pdoStatement = DatabaseConnection::getPdo()->query("SELECT * FROM voiture");

        foreach($pdoStatement as $voiture) {

            $voitures[] = static::construire($voiture);
        }
        return $voitures;
    }

    public static function getVoitureParImmat(string $immatriculation) : ?Voiture {

        // Préparation de la requête
        $pdoStatement = DatabaseConnection::getPdo()->prepare("SELECT * FROM voiture WHERE immatriculation = :immatriculationTag");

        $values = array("immatriculationTag" => $immatriculation);
        $pdoStatement->execute($values); // On donne les valeurs et on exécute la requête

        // On récupère les résultats comme précédemment
        // Note: fetch() renvoie false si pas de voiture correspondante
        $voiture = $pdoStatement->fetch();
        if ($voiture != false)
            return static::construire($voiture);
        else
            return null;
    }

    public static function sauvegarder(Voiture $voiture) : void {

        $pdoStatement = DatabaseConnection::getPdo()->prepare('INSERT INTO voiture (immatriculation, marque, couleur, nbSieges)
                                                                     VALUES (:immatriculation, :marque, :couleur, :nbSieges)');

        $values = array("immatriculation" => $voiture->getImmatriculation(),
                        "marque" => $voiture->getMarque(),
                        "couleur" => $voiture->getCouleur(),
                        "nbSieges" => $voiture->getNbSieges());

        $pdoStatement->execute($values);
    }

    public static function construire(array $voitureFormatTableau = []) : Voiture {

        $marque = $voitureFormatTableau['marque'];
        $couleur = $voitureFormatTableau['couleur'];
        $immatriculation = $voitureFormatTableau['immatriculation'];
        $nbSieges = $voitureFormatTableau['nbSieges'];

        return new Voiture($marque, $couleur, $immatriculation, $nbSieges);
    }

    public static function supprimerParImmatriculation(String $immatriculation) : void {

        $pdoStatement = DatabaseConnection::getPdo()->prepare('DELETE FROM voiture WHERE immatriculation=:immatriculation');
        $pdoStatement->execute(array("immatriculation" => $immatriculation));
    }

    public static function mettreAJour(Voiture $voiture) {

        $pdoStatement = DatabaseConnection::getPdo()->prepare('UPDATE voiture SET marque = :marque,
                                                                                        couleur = :couleur,
                                                                                        nbSieges = :nbSieges
                                                                     WHERE immatriculation = :immatriculation');

        $values = array("marque" => $voiture->getMarque(),
                        "couleur" => $voiture->getCouleur(),
                        "nbSieges" => $voiture->getNbSieges(),
                        "immatriculation" => $voiture->getImmatriculation());

        $pdoStatement->execute($values);
    }
}