<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Lib\ConnexionUtilisateur;
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
	
	public function create() : void
	{
		if (!ConnexionUtilisateur::estConnecte()) parent::create();
		else
		{
			FlashMessage::add("Vous êtes déjà connecté", FlashType::ERROR);
			header("Location: frontController.php?controller=utilisateur&action=readAll");
		}
	}
	
	public function created(): void
	{
		$login = preg_match("/.+/", $_POST["login"]);
		$prenom = preg_match("/.+/", $_POST["prenom"]);
		$nom = preg_match("/.+/", $_POST["nom"]);
		$password = preg_match("/.+/", $_POST["password"]);
		$password2 = preg_match("/.+/", $_POST["password2"]);
		$validLogin = preg_match("/[a-zA-Z0-9_]{4,16}/", $_POST["login"]);
		$validPrenom = preg_match("/[a-zA-Z]{2,16}/", $_POST["prenom"]);
		$validNom = preg_match("/[a-zA-Z]{2,16}/", $_POST["nom"]);
		$validPassword = preg_match("/.{3,128}/", $_POST["password"]);
		$available = (new UtilisateurRepository)->select($_POST["login"]) == null;
		$identique = $password && $password2 && $_POST["password"] == $_POST["password2"];
		$allowed = !ConnexionUtilisateur::estConnecte();
		
        if ($password) $_POST["password"] = MotDePasse::hacher($_POST["password"]);
		$_POST["admin"] = false;
		
		if		(!$allowed)			FlashMessage::add("Vous n'êtes pas autorisé à faire cette action", FlashType::ERROR);
		else if	(!$login)			FlashMessage::add("Veuillez entrer un nom d'utilisateur", FlashType::WARNING);
		else if	(!$prenom)			FlashMessage::add("Veuillez entrer un prénom", FlashType::WARNING);
		else if	(!$nom)				FlashMessage::add("Veuillez entrer un nom", FlashType::WARNING);
		else if	(!$password)		FlashMessage::add("Veuillez entrer un mot de passe", FlashType::WARNING);
		else if (!$password2)		FlashMessage::add("Veuillez confirmer votre mot de passe", FlashType::WARNING);
		else if (!$validLogin)		FlashMessage::add("Veuillez entrer un nom d'utilisateur valide (4 à 16 caractères alphanumériques)", FlashType::ERROR);
		else if (!$validPrenom)		FlashMessage::add("Veuillez entrer un prénom valide (2 à 16 caractères alphabétiques)", FlashType::ERROR);
		else if (!$validNom)		FlashMessage::add("Veuillez entrer un nom valide (2 à 16 caractères alphabétiques)", FlashType::ERROR);
		else if (!$validPassword)	FlashMessage::add("Veuillez entrer un mot de passe valide (3 à 128 caractères alphanumériques et spéciaux)", FlashType::ERROR);
		else if (!$available)		FlashMessage::add("Ce nom d'utilisateur n'est pas disponible", FlashType::ERROR);
		else if (!$identique)		FlashMessage::add("Confirmation du mot de passe erroné", FlashType::ERROR);
		else
		{
			FlashMessage::add("Votre compte a été créé", FlashType::SUCCESS);
			ConnexionUtilisateur::connecter($_POST["login"]);
			parent::created();
			$success = true;
		}
		isset($success) && $allowed ? header("Location: frontController.php") : $this->create();
	}
	
	public function update() : void
	{
		$allowed = isset($_GET["login"]) ? ConnexionUtilisateur::estUtilisateur($_GET["login"]) : ConnexionUtilisateur::estUtilisateur($_POST["login"]);
		
		if ($allowed) parent::update();
		else
		{
			FlashMessage::add("Vous n'avez pas accès à cette page", FlashType::ERROR);
			header("Location: frontController.php?controller=utilisateur&action=readAll");
		}
	}
	
	public function updated(): void
	{
		$login = preg_match("/.+/", $_POST["login"]);
		$prenom = preg_match("/.+/", $_POST["prenom"]);
		$nom = preg_match("/.+/", $_POST["nom"]);
		$password = preg_match("/.+/", $_POST["password"]);
		$newPassword = preg_match("/.+/", $_POST["newPassword"]);
		$newPassword2 = preg_match("/.+/", $_POST["ewPassword2"]);
		$validLogin = $login && preg_match("/[a-zA-Z0-9_]{4,16}/", $_POST["login"]);
		$validPrenom = $prenom && preg_match("/[a-zA-Z]{2,16}/", $_POST["prenom"]);
		$validNom = $nom && preg_match("/[a-zA-Z]{2,16}/", $_POST["nom"]);
		$validNewPassword = $newPassword && preg_match("/.{3,128}/", $_POST["newPassword"]);
		$correct = $password && $login && MotDePasse::verifier($_POST["password"], $this->getRepository()->select($_POST["login"])->getPassword());
		$identique = $newPassword && $newPassword2 && $_POST["newPassword"] == $_POST["newPassword2"];
		$different = $newPassword && $login && !MotDePasse::verifier($_POST["newPassword"], $this->getRepository()->select($_POST["login"])->getPassword());
		$allowed = $login ? ConnexionUtilisateur::estUtilisateur($_POST["login"]) : ConnexionUtilisateur::estUtilisateur($_GET["login"]);
		
		if ($password && $newPassword) $_POST["password"] = MotDePasse::hacher($_POST["newPassword"]);
		$_POST["admin"] = $login && $this->getRepository()->select($_POST["login"])->isAdmin();
		
		if		(!$allowed)				FlashMessage::add("Vous n'êtes pas autorisé à faire cette action", FlashType::ERROR);
		else if	(!$login)				FlashMessage::add("Veuillez entrer un nom d'utilisateur", FlashType::WARNING);
		else if	(!$prenom)				FlashMessage::add("Veuillez entrer un prénom", FlashType::WARNING);
		else if	(!$nom)					FlashMessage::add("Veuillez entrer un nom", FlashType::WARNING);
		else if	(!$password)			FlashMessage::add("Veuillez entrer votre mot de passe", FlashType::WARNING);
		else if (!$newPassword)			FlashMessage::add("Veuillez entrer un nouveau mot de passe", FlashType::WARNING);
		else if (!$newPassword2)		FlashMessage::add("Veuillez confirmer votre nouveau mot de passe", FlashType::WARNING);
		else if (!$validLogin)			FlashMessage::add("Veuillez entrer un nom d'utilisateur valide (4 à 16 caractères alphanumériques)", FlashType::ERROR);
		else if (!$validPrenom)			FlashMessage::add("Veuillez entrer un prénom valide (2 à 16 caractères alphabétiques)", FlashType::ERROR);
		else if (!$validNom)			FlashMessage::add("Veuillez entrer un nom valide (2 à 16 caractères alphabétiques)", FlashType::ERROR);
		else if (!$validNewPassword)	FlashMessage::add("Veuillez entrer un nouveau mot de passe valide (3 à 128 caractères alphanumériques et spéciaux)", FlashType::ERROR);
		else if	(!$correct)				FlashMessage::add("Mot de passe erroné", FlashType::ERROR);
		else if	(!$identique)			FlashMessage::add("Confirmation du nouveau mot de passe erroné", FlashType::ERROR);
		else if	(!$different)			FlashMessage::add("Veuillez entrer un nouveau mot de passe différent", FlashType::ERROR);
		else
		{
			FlashMessage::add("Votre profil a été modifié", FlashType::SUCCESS);
			parent::updated();
			$success = true;
		}
		isset($success) && $allowed ? header("Location: frontController.php") : $this->update();
	}
	
	public function delete() : void
	{
		$allowed = isset($_GET["login"]) ? ConnexionUtilisateur::estUtilisateur($_GET["login"]) : ConnexionUtilisateur::estUtilisateur($_POST["login"]);
		
		if ($allowed)
		{
			ConnexionUtilisateur::deconnecter();
			parent::delete();
		}
		else
		{
			FlashMessage::add("Vous n'êtes pas autorisé à faire cette action", FlashType::ERROR);
			header("Location: frontController.php?controller=utilisateur&action=readAll");
		}
	}
	
	public function connexion() : void
	{
		if (!ConnexionUtilisateur::estConnecte())
		{
			self::afficheVue('../view/view.php', ["pagetitle" => "Se connecter",
															"cheminVueBody" => "utilisateur/connexion.php"]);
		}
		else
		{
			FlashMessage::add("Vous êtes déjà connecté22222", FlashType::ERROR);
			header("Location: frontController.php?controller=utilisateur&action=readAll");
		}
	}
	
	public function connecter() : void
	{
		$login =  preg_match("/.+/", $_POST["login"]);
		$password = preg_match("/.+/", $_POST["password"]);
		$exist = (new UtilisateurRepository)->select($_POST["login"]) != null ? true : false;
		$correct = $exist && $password ? MotDePasse::verifier($_POST["password"], $this->getRepository()->select($_POST["login"])->getPassword()) : false;
		$allowed = !ConnexionUtilisateur::estConnecte();
		
		if		(!$allowed)		FlashMessage::add("Vous n'êtes pas autorisé à faire cette action", FlashType::ERROR);
		else if	(!$login)		FlashMessage::add("Veuillez entrer votre nom d'utilisateur", FlashType::WARNING);
		else if (!$password)	FlashMessage::add("Veuillez entrer votre mot de passe", FlashType::WARNING);
		else if	(!$exist)		FlashMessage::add("Ce nom d'utilisateur n'existe pas", FlashType::ERROR);
		else if	(!$correct)		FlashMessage::add("Mot de passe erroné", FlashType::ERROR);
		else
		{
			FlashMessage::add("Vous êtes connecté", FlashType::SUCCESS);
			ConnexionUtilisateur::connecter($_POST["login"]);
			header("Location: frontController.php");
			$success = true;
		}
		isset($success) && $allowed ? header("Location: frontController.php") : $this->connexion();
	}
	
	public function deconnecter() : void
	{
		if (ConnexionUtilisateur::estConnecte())
		{
			FlashMessage::add("Vous êtes déconnecté", FlashType::SUCCESS);
			ConnexionUtilisateur::deconnecter();
			header("Location: frontController.php");
		}
		else
		{
			FlashMessage::add("Vous n'êtes pas connecté", FlashType::ERROR);
			header("Location: frontController.php");
		}
	}
}