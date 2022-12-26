<?php

namespace App\Covoiturage\Lib;

use App\Covoiturage\Model\HTTP\Session;

class FlashMessage
{
    private static string $key = "FlashMessage";
	public readonly string $message;
	public readonly string $type;
	public function __construct(string $message, FlashType $type)
	{
		$this->message = $message;
		$this->type = $type->value;
	}

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