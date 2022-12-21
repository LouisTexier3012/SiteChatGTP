<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\Repository\TrajetRepository;

class ControllerTrajet extends GenericController implements InterfaceController
{
    public function getRepository(): TrajetRepository
    {
		return new TrajetRepository();
    }
}