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
	
	public function construire(array $utilisateurFormatTableau) : Utilisateur
    {
        $login = $utilisateurFormatTableau['login'];
        $nom = $utilisateurFormatTableau['nom'];
        $prenom = $utilisateurFormatTableau['prenom'];

        return new Utilisateur($login, $nom, $prenom);
    }
	
	public function getNomsColonnes() : array
    {
        return ['login', 'prenom', 'nom'];
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