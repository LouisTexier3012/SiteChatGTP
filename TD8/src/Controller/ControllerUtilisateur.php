<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Lib\FlashMessageManager;
use App\Covoiturage\Lib\FlashType;
use App\Covoiturage\Lib\MotDePasse;
use App\Covoiturage\Model\HTTP\Session;
use App\Covoiturage\Model\Repository\UtilisateurRepository;

class ControllerUtilisateur extends GenericController implements InterfaceController
{
    public function getRepository() : UtilisateurRepository
    {
        return new UtilisateurRepository();
    }
	
	public function created(): void
	{
		$identique = $_GET["password"] == $_GET["password2"];
		$_GET["password"] = MotDePasse::hacher($_GET["password"]);
		
		if ($identique) FlashMessageManager::add("Votre compte a bien été créé", FlashType::SUCCESS);
		else			FlashMessageManager::add("Confirmation du mot de passe erroné", FlashType::WARNING);
		
		if ($identique)	parent::created();
		else header("Location: frontController.php?controller=utilisateur&action=create");
	}
	
	public function updated(): void
	{
		$utilisateur = $this->getRepository()->select($_GET["login"]);
		$correct = MotDePasse::verifier($_GET["password"], $utilisateur->getPassword());
		$identique = $_GET["newPassword"] == $_GET["newPassword2"];
		$different = !MotDePasse::verifier($_GET["newPassword"], $utilisateur->getPassword());
		$_GET["password"] = MotDePasse::hacher($_GET["newPassword"]);
		
		if		(!$correct)	  FlashMessageManager::add("Mot de passe erroné", FlashType::WARNING);
		else if	(!$different) FlashMessageManager::add("Veuillez entrer un nouveau mot de passe différent", FlashType::WARNING);
		else if	(!$identique) FlashMessageManager::add("Confirmation du nouveau mot de passe erroné", FlashType::WARNING);
		else				  FlashMessageManager::add("Votre profil a bien été modifié", FlashType::SUCCESS);
		
		if ($correct && $different && $identique) parent::updated();
		else header("Location: frontController.php?controller=utilisateur&action=update&login=" . $_GET['login']);
	}
}