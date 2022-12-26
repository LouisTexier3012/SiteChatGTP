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
		$identique = $_POST["password"] == $_POST["password2"];
        $_POST["password"] = MotDePasse::hacher($_POST["password"]);
		
		if ($identique) FlashMessage::add("Votre compte a bien été créé", FlashType::SUCCESS);
		else			FlashMessage::add("Confirmation du mot de passe erroné", FlashType::WARNING);
		
		if ($identique)	parent::created();
		else header("Location: frontController.php?controller=utilisateur&action=create");
	}
	
	public function updated(): void
	{
		$utilisateur = $this->getRepository()->select($_POST["login"]);
		$correct = MotDePasse::verifier($_POST["password"], $utilisateur->getPassword());
		$identique = $_POST["newPassword"] == $_POST["newPassword2"];
		$different = !MotDePasse::verifier($_POST["newPassword"], $utilisateur->getPassword());
        $_POST["password"] = MotDePasse::hacher($_POST["newPassword"]);
		
		if		(!$correct)	  FlashMessage::add("Mot de passe erroné", FlashType::WARNING);
		else if	(!$different) FlashMessage::add("Veuillez entrer un nouveau mot de passe différent", FlashType::WARNING);
		else if	(!$identique) FlashMessage::add("Confirmation du nouveau mot de passe erroné", FlashType::WARNING);
		else				  FlashMessage::add("Votre profil a bien été modifié", FlashType::SUCCESS);
		
		if ($correct && $different && $identique) parent::updated();
		else header("Location: frontController.php?controller=utilisateur&action=update&login=" . $_GET['login']);
	}
}