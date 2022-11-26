<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\Repository\AbstractRepository;

interface InterfaceController
{
	function getRepository() : AbstractRepository;
}