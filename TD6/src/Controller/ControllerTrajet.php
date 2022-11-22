<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\Repository\TrajetRepository;

class ControllerTrajet extends AbstractController
{
    protected function getRepository(): TrajetRepository
    {
        return new TrajetRepository();
    }
}