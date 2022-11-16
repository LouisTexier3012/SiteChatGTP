<?php

namespace App\Covoiturage\Model;

class ModelVoiture {

    private string $marque;
    private string $couleur;
    private string $immatriculation;
    private int $nbSieges;

    // un getter
    public function getMarque() : string {
        return $this->marque;
    }

    // un setter
    public function setMarque(string $marque) : void {
        $this->marque = $marque;
    }

    public function getCouleur() : string {
        return $this->couleur;
    }

    public function getImmatriculation() : string {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation) : void {
        $this->immatriculation = substr($immatriculation, 0, 8);
    }

    public function getNbSieges() : int {
        return $this->nbSieges;
    }

    public function __construct(string $marque, string $couleur, string $immatriculation, int $nbSieges) {
        $this->marque = $marque;
        $this->couleur = $couleur;
        $this->immatriculation = substr($immatriculation, 0, 8);
        $this->nbSieges = $nbSieges;
    }

    public function afficher() : void {
        echo "<p>Voiture $this->immatriculation de marque $this->marque (couleur $this->couleur, $this->nbSieges sieges)<p>";
    }

    public static function construire(array $voitureFormatTableau) : Voiture {

        $marque = $voitureFormatTableau['marque'];
        $couleur = $voitureFormatTableau['couleur'];
        $immatriculation = $voitureFormatTableau['immatriculation'];
        $nbSieges = $voitureFormatTableau['nbSieges'];

        return new Voiture($marque, $couleur, $immatriculation, $nbSieges);
    }

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

    public function sauvegarder() : void {

        $pdoStatement = DatabaseConnection::getPdo()->prepare('INSERT INTO voiture (immatriculation, marque, couleur, nbSieges)
                                                        VALUES (:immatriculation, :marque, :couleur, :nbSieges)');

        $values = array("immatriculation" => $this->immatriculation,
                        "marque" => $this->marque,
                        "couleur" => $this->couleur,
                        "nbSieges" => $this->nbSieges);

        $pdoStatement->execute($values);
    }


}
?>