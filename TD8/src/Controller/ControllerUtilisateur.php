<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Lib\FlashMessage;
use App\Covoiturage\Lib\FlashType;
use App\Covoiturage\Lib\MotDePasse;
use App\Covoiturage\Model\Repository\UtilisateurRepository;

class ControllerUtilisateur extends GenericController implements InterfaceController
{
    public function getRepository() : UtilisateurRepository
    {
        return new UtilisateurRepository();
    }
	
	public function created(): void
	{
		$login = preg_match("/.+/", $_POST["login"]);
		$prenom = preg_match("/.+/", $_POST["prenom"]);
		$nom = preg_match("/.+/", $_POST["nom"]);
		$password = preg_match("/.{3,}/", $_POST["password"]);
		$password2 = preg_match("/.{3,}/", $_POST["password2"]);
		$identique = $_POST["password"] == $_POST["password2"];
        $_POST["password"] = MotDePasse::hacher($_POST["password"]);
		
		if		(!$login)		FlashMessage::add("Veuillez entrer un nom d'utilisateur", FlashType::WARNING);
		else if	(!$prenom)		FlashMessage::add("Veuillez entrer un prénom", FlashType::WARNING);
		else if	(!$nom)			FlashMessage::add("Veuillez entrer un nom", FlashType::WARNING);
		else if	(!$password)	FlashMessage::add("Veuillez entrer un mot de passe", FlashType::WARNING);
		else if (!$password2)	FlashMessage::add("Veuillez confirmer votre mot de passe", FlashType::WARNING);
		else if (!$identique)	FlashMessage::add("Confirmation du mot de passe erroné", FlashType::WARNING);
		else					FlashMessage::add("Votre compte a été créé", FlashType::SUCCESS);
		
		if ($login && $prenom && $nom && $password && $password2 && $identique)	parent::created();
		else																	$this->create();
	}
	
	public function updated(): void
	{
		$login = preg_match("/.+/", $_POST["login"]);
		$prenom = preg_match("/.+/", $_POST["prenom"]);
		$nom = preg_match("/.+/", $_POST["nom"]);
		$password = preg_match("/.{3,}/", $_POST["password"]);
		$newPassword = preg_match("/.{3,}/", $_POST["newPassword"]);
		$newPassword2 = preg_match("/.{3,}/", $_POST["newPassword"]);
		$correct = MotDePasse::verifier($_POST["password"], $this->getRepository()->select($_POST["login"])->getPassword());
		$identique = $_POST["newPassword"] == $_POST["newPassword2"];
		$different = !MotDePasse::verifier($_POST["newPassword"], $this->getRepository()->select($_POST["login"])->getPassword());
        $_POST["password"] = MotDePasse::hacher($_POST["newPassword"]);
		
		if		(!$login)			FlashMessage::add("Veuillez entrer un nom d'utilisateur", FlashType::WARNING);
		else if	(!$prenom)			FlashMessage::add("Veuillez entrer un prénom", FlashType::WARNING);
		else if	(!$nom)				FlashMessage::add("Veuillez entrer un nom", FlashType::WARNING);
		else if	(!$password)		FlashMessage::add("Veuillez entrer votre mot de passe", FlashType::WARNING);
		else if (!$newPassword)		FlashMessage::add("Veuillez entrer un nouveau mot de passe", FlashType::WARNING);
		else if (!$newPassword2)	FlashMessage::add("Veuillez confirmer votre nouveau mot de passe", FlashType::WARNING);
		else if	(!$correct)			FlashMessage::add("Mot de passe erroné", FlashType::WARNING);
		else if	(!$identique)		FlashMessage::add("Confirmation du nouveau mot de passe erroné", FlashType::WARNING);
		else if	(!$different)		FlashMessage::add("Veuillez entrer un nouveau mot de passe différent", FlashType::WARNING);
		else				  		FlashMessage::add("Votre profil a été modifié", FlashType::SUCCESS);
		
		if ($login && $prenom && $nom && $password && $newPassword && $newPassword2 && $correct && $identique && $different) parent::updated();
		else																												 $this->update();
	}
}