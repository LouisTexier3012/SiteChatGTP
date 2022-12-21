<?php

namespace App\Covoiturage\Lib;

class FlashMessage
{
	public readonly string $message;
	public readonly string $type;
	public function __construct(string $message, FlashType $type)
	{
		$this->message = $message;
		$this->type = $type->value;
	}
}