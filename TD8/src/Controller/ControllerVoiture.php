<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Lib\FlashMessage;
use App\Covoiturage\Lib\FlashType;
use App\Covoiturage\Model\Repository\VoitureRepository;
use App\Covoiturage\Controller\GenericController;

class ControllerVoiture extends GenericController implements InterfaceController
{
	public function getRepository() : VoitureRepository
	{
		return new VoitureRepository();
	}
	
	public function created(): void
	{
		$immatriculation = preg_match("/.{7}/", $_POST["immatriculation"]);
		$marque = preg_match("/.+/", $_POST["marque"]);
		$couleur = preg_match("/.+/", $_POST["couleur"]);
		$nbSieges = $_POST["nbSieges"] >= 1 && $_POST["nbSieges"] <= 50;
		
		if		(!$immatriculation)	FlashMessage::add("Veuillez entrer une immatriculation valide", FlashType::WARNING);
		else if	(!$marque)			FlashMessage::add("Veuillez entrer une marque valide", FlashType::WARNING);
		else if	(!$couleur)			FlashMessage::add("Veuillez entrer une couleur valide", FlashType::WARNING);
		else if	(!$nbSieges)		FlashMessage::add("Veuillez entrer un nombre de sièges valide", FlashType::WARNING);
		else 						FlashMessage::add("Voiture ajoutée avec succès", FlashType::SUCCESS);
		
		if ($immatriculation && $marque && $couleur && $nbSieges)	parent::created();
		else														$this->create();
	}
}