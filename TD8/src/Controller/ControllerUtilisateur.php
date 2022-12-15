<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\HTTP\Session;
use App\Covoiturage\Model\Repository\UtilisateurRepository;
use function Sodium\compare;

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
	
	/**
	 * @noinspection PhpUnused
	 */
	public function created(): void
	{
		if ($_GET["password"] == $_GET["password2"])
		{
			GenericController::created();
		}
		else GenericController::error("Vérifiez que les mots de passe soient identiques");
	}
}