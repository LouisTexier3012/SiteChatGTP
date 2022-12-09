<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\HTTP\Session;
use App\Covoiturage\Model\Repository\UtilisateurRepository;

class ControllerUtilisateur extends GenericController implements InterfaceController
{
    public function getRepository() : UtilisateurRepository
    {
        return new UtilisateurRepository();
    }
	
	public function createSession() : void
	{
		$session = Session::getInstance();;
		$session->enregistrer("login", "Paul McCartney");
	}
}