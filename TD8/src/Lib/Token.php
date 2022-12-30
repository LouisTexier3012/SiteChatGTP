<?php

namespace App\Covoiturage\Lib;

use App\Covoiturage\Model\HTTP\Session;

class Token
{
	public static function getToken() : string
	{
		$nonce = MotDePasse::genererChaineAleatoire(32);
		Session::getInstance()->enregistrer("token", $nonce);
		Session::getInstance()->enregistrer("time", time());
		return $nonce;
	}
	
	public static function isValid(string $token) : bool
	{
		$valid = (Session::getInstance()->read("token") == $token);
		Session::getInstance()->delete("token");
		return $valid;
	}
	
	public static function isTimeout() : bool
	{
		return time() <= Session::getInstance()->read("time") + 360; //5 minutes
	}
}