<?php
class Voiture {

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
}
?>