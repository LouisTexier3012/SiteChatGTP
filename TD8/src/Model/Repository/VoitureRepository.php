<?php

namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\Voiture;

class VoitureRepository extends AbstractRepository {

    public function construire(array $voitureFormatTableau = []) : Voiture
	{
        $marque = $voitureFormatTableau['marque'];
        $model = $voitureFormatTableau['model'];
        $couleur = $voitureFormatTableau['couleur'];
        $immatriculation = $voitureFormatTableau['immatriculation'];
        $nbSieges = $voitureFormatTableau['nbSieges'];

        return new Voiture($marque, $model, $couleur, $immatriculation, $nbSieges);
    }

	public function getNomTable(): string
	{
		return 'voiture';
	}
	
	public function getNomClePrimaire(): string
    {
        return 'immatriculation';
    }
	
	public function getNomsColonnes(): array
    {
        return ['immatriculation', 'marque', 'model', 'couleur', 'nbSieges'];
    }
	
	
	public function isFirstLetterVowel(): bool
	{
		return false;
	}
	
	public function isFeminine(): bool
	{
		return true;
	}
}