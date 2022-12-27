<?php

namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\Trajet;

class TrajetRepository extends AbstractRepository
{
    public function getNomTable(): string
    {
        return 'trajet';
    }

    public function getNomClePrimaire(): string
    {
        return 'id';
    }

    public function getNomsColonnes(): array
    {
        return ['id', 'depart', 'arrivee', 'date', 'nbPlaces', 'prix', 'conducteurLogin'];
    }
	
	public function construire(array $trajetArray) : Trajet
    {
		if (isset($trajetArray['id']))	$id = $trajetArray['id'];
		else								$id = null;
        $depart = $trajetArray['depart'];
        $arrivee = $trajetArray['arrivee'];
        $date = $trajetArray['date'];
        $nbPlaces = $trajetArray['nbPlaces'];
        $prix = $trajetArray['prix'];
        $conducteurLogin = $trajetArray['conducteurLogin'];

        return new Trajet($id, $depart, $arrivee, $date, $nbPlaces, $prix, $conducteurLogin);
    }
	
	public function isFirstLetterVowel(): bool
	{
		return false;
	}
	
	public function isFeminine(): bool
	{
		return false;
	}
}