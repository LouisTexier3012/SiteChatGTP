<?php

namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\AbstractDataObject;
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
	
	public function construire(array $utilisateurArray): AbstractDataObject
    {
        $id = $utilisateurArray['id'];
        $depart = $utilisateurArray['depart'];
        $arrivee = $utilisateurArray['arrivee'];
        $date = $utilisateurArray['date'];
        $nbPlaces = $utilisateurArray['nbPlaces'];
        $prix = $utilisateurArray['prix'];
        $conducteurLogin = $utilisateurArray['conducteurLogin'];

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