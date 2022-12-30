<?php

namespace App\Covoiturage\Model\HTTP;

use Exception;

class Session
{
	private static ?Session $instance = null;
	
	/**
	* @throws Exception
	*/
	private function __construct()
	{
		if (session_start() === false) throw new Exception("La session n'a pas réussi à démarrer.");
	}
	
	public static function getInstance(): Session
	{
		if (is_null(static::$instance))
		{
			static::$instance = new Session();
		}
		return static::$instance;
	}
	
	public function contains($name): bool
	{
		return isset($_SESSION[$name]);
	}
	
	public function enregistrer(string $name, $value): void
	{
		$_SESSION[$name] = $value;
	}
	
	public function read(string $name)
	{
		return static::getInstance()->contains($name) ? $_SESSION[$name] : null;
	}
	
	public function delete($name) : void
	{
		unset($_SESSION[$name]);
	}
	
	public function detruire() : void
	{
		session_unset();                    //unset $_SESSION variable for the run-time
		session_destroy();                  //destroy session data in storage
		Cookie::supprimer(session_name());  //deletes the session cookie
		$instance = null;                   //il faudra reconstruire la session au prochain appel de getInstance()
	}
	
	public static function verifierDerniereActivite() : void
	{
		if (isset($_SESSION['derniereActivite']) && time() - $_SESSION['derniereActivite'] > $dureeExpiration)
		{
			session_unset(); //unsets $_SESSION variable for the run-time
		}
		$_SESSION['derniereActivite'] = time(); //update last activity time stamp
	}
}