<?php

namespace App\Covoiturage\Lib;

use App\Covoiturage\Model\HTTP\Session;
use App\Covoiturage\Model\Repository\UtilisateurRepository;

class ConnexionUtilisateur
{
	// L'utilisateur connecté sera enregistré en session associé à la clé suivante
	private static string $key = "userConnexion";
	
	public static function connecter(string $loginUtilisateur): void
	{
		Session::getInstance()->enregistrer(self::$key, $loginUtilisateur);
	}
	
	public static function estConnecte(): bool
	{
		return Session::getInstance()->contains(self::$key) ? true : false;
	}
	
	public static function deconnecter(): void
	{
		Session::getInstance()->delete(self::$key);
	}
	
	public static function getLoginUtilisateurConnecte(): ?string
	{
		return Session::getInstance()->read(self::$key);
	}
	
	public static function estUtilisateur($login) : bool
	{
		return self::getLoginUtilisateurConnecte() == $login;
	}
	
	public static function estAdministrateur() : bool
	{
		return self::estConnecte() && (new UtilisateurRepository)->select(self::getLoginUtilisateurConnecte())->isAdmin() == 1;
	}
}