<?php

namespace App\Covoiturage\Lib;

use App\Covoiturage\Model\HTTP\Cookie;

class PreferenceController
{
	public static function enregistrer(string $controller) : void
	{
		Cookie::enregistrer("controller", $controller);
	}
	
	public static function lire() : string
	{
		return Cookie::lire("controller");
	}
	
	public static function existe() : bool
	{
		return Cookie::contient("controller");
	}
	
	public static function supprimer() : void
	{
		// À compléter
	}
}