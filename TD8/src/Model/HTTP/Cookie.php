<?php

namespace App\Covoiturage\Model\HTTP;

class Cookie
{
	public static function enregistrer(string $cle, string $valeur, ?int $dureeExpiration = null)
	{
		if (is_null($dureeExpiration))	setcookie($cle, serialize($valeur));
		else							setcookie($cle, serialize($valeur), $dureeExpiration);
	}

	public static function lire(string $cle) : ?string
	{
		return unserialize($_COOKIE[$cle]);
	}

	public static function contient($cle) : bool
	{
		return isset($_COOKIE[$cle]);
	}

	public static function supprimer($cle) : void
	{
		unset($_COOKIE[$cle]);
		setcookie($cle, "", 1);
	}
}