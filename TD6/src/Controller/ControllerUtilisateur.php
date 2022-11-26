<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\Repository\UtilisateurRepository;

class ControllerUtilisateur extends AbstractController
{
    protected function getRepository(): UtilisateurRepository
    {
        return new UtilisateurRepository();
    }
}