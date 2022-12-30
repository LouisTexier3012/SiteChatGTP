<?php

namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Lib\MotDePasse;
use App\Covoiturage\Model\DataObject\Utilisateur;

class UtilisateurRepository extends AbstractRepository
{
    public function getNomTable() : string
    {
        return "utilisateur";
    }
	
	public function getNomClePrimaire() : string
    {
        return "login";
    }
	
	public function construire(array $utilisateurArray) : Utilisateur
    {
        $login = $utilisateurArray["login"];
		$unchecked = $utilisateurArray["unchecked"];
		$email = $utilisateurArray["email"];
		$nonce = $utilisateurArray["nonce"];
        $nom = $utilisateurArray["nom"];
        $prenom = $utilisateurArray["prenom"];
		$password = $utilisateurArray["password"];
		$admin = $utilisateurArray["admin"];

        return new Utilisateur($login, $unchecked, $email, $nonce, $nom, $prenom, $password, $admin);
    }
	
	public function getNomsColonnes() : array
    {
        return ["login", "unchecked", "email", "nonce", "nom", "prenom", "password", "admin"];
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