<?php

namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\Utilisateur;

class UtilisateurRepository extends AbstractRepository
{
    public function getNomTable() : string
    {
        return 'utilisateur';
    }
	
	public function getNomClePrimaire() : string
    {
        return 'login';
    }
	
	public function construire(array $utilisateurArray) : Utilisateur
    {
        $login = $utilisateurArray['login'];
        $nom = $utilisateurArray['nom'];
        $prenom = $utilisateurArray['prenom'];

        return new Utilisateur($login, $nom, $prenom);
    }
	
	public function getNomsColonnes() : array
    {
        return ['login', 'nom', 'prenom'];
    }
	
	public function isFirstLetterVowel() : bool
	{
		return true;
	}
	
	public function isFeminine(): bool
	{
		return false;
	}
}