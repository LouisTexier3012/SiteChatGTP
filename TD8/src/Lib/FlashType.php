<?php

namespace App\Covoiturage\Lib;

enum FlashType : string
{
	case SUCCESS = "success";
	case INFO = "info";
	case WARNING = "warning";
	case ERROR = "error";
}