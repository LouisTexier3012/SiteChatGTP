<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Lib\ConnexionUtilisateur;
use App\Covoiturage\Lib\FlashMessage;
use App\Covoiturage\Lib\FlashType;
use App\Covoiturage\Model\Repository\TrajetRepository;
use App\Covoiturage\Model\Repository\UtilisateurRepository;

class ControllerTrajet extends GenericController implements InterfaceController
{
    public function getRepository(): TrajetRepository
    {
		return new TrajetRepository();
    }
	
	public function created() : void
	{
		$depart = preg_match("/.+/", $_POST["depart"]);
		$arrivee = preg_match("/.+/", $_POST["arrivee"]);
		$date = $_POST["date"] >= date("Y-m-d");
		$nbPlaces = $_POST["nbPlaces"] >= 1 && $_POST["nbPlaces"] <= 50;
		$prix = $_POST["prix"] >= 1 && $_POST["prix"] <= 1000;
		$conducteurLogin = preg_match("/.+/", $_POST["conducteurLogin"]);
		$exist = (new UtilisateurRepository)->select($_POST["conducteurLogin"]) != null ? true : false;
		
		if		(!$depart)			FlashMessage::add("Veuillez entrer un depart valide", FlashType::WARNING);
		else if	(!$arrivee)			FlashMessage::add("Veuillez entrer un arrivée valide", FlashType::WARNING);
		else if	(!$date)			FlashMessage::add("Veuillez entrer une date valide", FlashType::WARNING);
		else if	(!$nbPlaces)		FlashMessage::add("Veuillez entrer un nombre de place valide", FlashType::WARNING);
		else if	(!$prix)			FlashMessage::add("Veuillez entrer un prix valide", FlashType::WARNING);
		else if	(!$conducteurLogin)	FlashMessage::add("Veuillez entrer un nom d'utilisateur", FlashType::WARNING);
		else if	(!$exist)			FlashMessage::add("Veuillez entrer un nom d'utilisateur existant", FlashType::WARNING);
		else 						FlashMessage::add("Trajet ajouté avec succès", FlashType::SUCCESS);
		
		if ($depart && $arrivee && $date && $nbPlaces && $prix && $conducteurLogin && $exist) parent::created();
		else																				  $this->create();
	}
	
	public function updated(): void
	{
		$depart = preg_match("/.+/", $_POST["depart"]);
		$arrivee = preg_match("/.+/", $_POST["arrivee"]);
		$date = $_POST["date"] >= date("Y-m-d");
		$nbPlaces = $_POST["nbPlaces"] >= 1 && $_POST["nbPlaces"] <= 50;
		$prix = $_POST["prix"] >= 1 && $_POST["prix"] <= 1000;
		$conducteurLogin = preg_match("/.+/", $_POST["conducteurLogin"]);
		$exist = (new UtilisateurRepository)->select($_POST["conducteurLogin"]) != null ? true : false;
		
		if		(!$depart)			FlashMessage::add("Veuillez entrer un depart valide", FlashType::WARNING);
		else if	(!$arrivee)			FlashMessage::add("Veuillez entrer un arrivée valide", FlashType::WARNING);
		else if	(!$date)			FlashMessage::add("Veuillez entrer une date valide", FlashType::WARNING);
		else if	(!$nbPlaces)		FlashMessage::add("Veuillez entrer un nombre de place valide", FlashType::WARNING);
		else if	(!$prix)			FlashMessage::add("Veuillez entrer un prix valide", FlashType::WARNING);
		else if	(!$conducteurLogin)	FlashMessage::add("Veuillez entrer un nom d'utilisateur", FlashType::WARNING);
		else if	(!$exist)			FlashMessage::add("Veuillez entrer un nom d'utilisateur existant", FlashType::WARNING);
		else 						FlashMessage::add("Trajet ajouté avec succès", FlashType::SUCCESS);
		
		if ($depart && $arrivee && $date && $nbPlaces && $prix && $conducteurLogin && $exist) parent::updated();
		else																				  $this->update();
	}
}