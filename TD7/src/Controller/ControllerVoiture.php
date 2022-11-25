<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\Repository\VoitureRepository;

class ControllerVoiture extends GenericController
{
    protected function getRepository(): VoitureRepository
    {
        return new VoitureRepository();
    }
}