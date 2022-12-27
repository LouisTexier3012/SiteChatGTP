<?php

namespace App\Covoiturage\Model\DataObject;

class Trajet extends AbstractDataObject {

    private ?int $id;
    private string $depart;
    private string $arrivee;
    private string $date;
    private int $nbPlaces;
    private int $prix;
    private string $conducteurLogin;

    public function __construct(?int $id, string $depart, string $arrivee, string $date, int $nbPlaces, int $prix, string $conducteurLogin)
    {
		$this->id = $id;
        $this->depart = $depart;
        $this->arrivee = $arrivee;
        $this->date = $date;
        $this->nbPlaces = $nbPlaces;
        $this->prix = $prix;
        $this->conducteurLogin = $conducteurLogin;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepart(): string
    {
        return $this->depart;
    }

    public function getArrivee(): string
    {
        return $this->arrivee;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getNbPlaces(): int
    {
        return $this->nbPlaces;
    }

    public function getPrix(): int
    {
        return $this->prix;
    }

    public function getConducteurLogin(): string
    {
        return $this->conducteurLogin;
    }

    public function formatTableau(): array
    {
        return array("id" => $this->id,
					 "depart" => $this->depart,
                     "arrivee" => $this->arrivee,
                     "date" => $this->date,
                     "nbPlaces" => $this->nbPlaces,
                     "prix" => $this->prix,
                     "conducteurLogin" => $this->conducteurLogin);
    }
}