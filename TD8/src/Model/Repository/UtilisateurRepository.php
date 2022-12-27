<?php

namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Lib\MotDePasse;
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
	
	public function construire(array $trajetArray) : Utilisateur
    {
        $login = $trajetArray['login'];
        $nom = $trajetArray['nom'];
        $prenom = $trajetArray['prenom'];
		$password = $trajetArray['password'];

        return new Utilisateur($login, $nom, $prenom, $password);
    }
	
	public function getNomsColonnes() : array
    {
        return ['login', 'nom', 'prenom', 'password'];
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