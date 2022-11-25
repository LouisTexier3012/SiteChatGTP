<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\Repository\UtilisateurRepository;

class ControllerUtilisateur extends GenericController
{
    protected function getRepository() : UtilisateurRepository
    {
        return new UtilisateurRepository();
    }
}