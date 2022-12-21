<?php

namespace App\Covoiturage\Lib;

use App\Covoiturage\Model\HTTP\Session;

class FlashMessageManager
{
	private static string $key = "FlashMessage";
	
	/**
	 * Adds a FlashMessage in the FlashMessage array stocked in $_SESSION[$key]
	 * @param string $message
	 * @param FlashType $type
	 */
	public static function add(string $message, FlashType $type) : void
	{
		$messages = Session::getInstance()->read(self::$key);
		$messages[] = new FlashMessage($message, $type);
		Session::getInstance()->enregistrer(self::$key, $messages);
	}
	
	/**
	 * Returns all FlashMessage in an array and deletes it from session
	 * @return  FlashMessage[]
	 */
	public static function read() : array
	{
		$messages = Session::getInstance()->read(self::$key);
		Session::getInstance()->delete(self::$key);
		return $messages !== null ? $messages : [];
	}
}