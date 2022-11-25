<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\Repository\TrajetRepository;

class ControllerTrajet extends GenericController
{
    protected function getRepository(): TrajetRepository
    {
        return new TrajetRepository();
    }
}