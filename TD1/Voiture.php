<?php
class Voiture {

    private $marque;
    private $couleur;
    private $immatriculation;
    private $nbSieges; // Nombre de places assises

    // un getter
    public function getMarque() {
        return $this->marque;
    }

    // un setter
    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function getCouleur()
    {
        return $this->couleur;
    }

    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    public function setImmatriculation($immatriculation): void
    {
        $this->immatriculation = substr($immatriculation, 0, 8);
    }

    public function getNbSieges()
    {
        return $this->nbSieges;
    }

    public function __construct(
        $marque,
        $couleur,
        $immatriculation,
        $nbSieges
    ) {
        $this->marque = $marque;
        $this->couleur = $couleur;
        $this->immatriculation = $immatriculation;
        $this->nbSieges = $nbSieges;
    }

    public function afficher() {
        echo "<p>Voiture $this->immatriculation de marque $this->marque (couleur $this->couleur, $this->nbSieges sieges)<p>";
    }
}
?>