<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Lib\ConnexionUtilisateur;
use App\Covoiturage\Lib\FlashMessage;
use App\Covoiturage\Lib\FlashType;
use App\Covoiturage\Lib\MotDePasse;
use App\Covoiturage\Lib\Token;
use App\Covoiturage\Lib\VerificationEmail;
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
		$token			= isset($_POST["token"]) && Token::isValid($_POST["token"]);
		$timeout		= Token::isTimeout();
		$allowed		= !ConnexionUtilisateur::estConnecte();
		$loginSet		= isset($_POST["login"]) && $_POST["login"] != "";
		$emailSet		= isset($_POST["email"]) && $_POST["email"] != "";
		$prenomSet		= isset($_POST["prenom"]) && $_POST["prenom"] != "";
		$nomSet			= isset($_POST["nom"]) && $_POST["nom"] != "";
		$passwordSet	= isset($_POST["password"]) && $_POST["password"] != "";
		$confirmSet		= isset($_POST["confirm"]) && $_POST["confirm"] != "";
		$loginValid		= $loginSet && preg_match("/[a-zA-Z0-9_]{4,16}/", $_POST["login"]);
		$emailValid		= $emailSet && (bool) filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
		$prenomValid	= $prenomSet && preg_match("/[a-zA-Z]{2,16}/", $_POST["prenom"]);
		$nomValid		= $nomSet && preg_match("/[a-zA-Z]{2,16}/", $_POST["nom"]);
		$passwordValid	= $loginSet && preg_match("/.{3,128}/", $_POST["password"]);
		$confirmValid	= $passwordSet && $confirmSet && $_POST["password"] == $_POST["confirm"];
		$available		= $loginSet && (new UtilisateurRepository)->select($_POST["login"]) == null;

		if		(!$token)			FlashMessage::add("Un problème est survenu", FlashType::ERROR);
		elseif	(!$timeout)			FlashMessage::add("Le token a expiré, veuillez réessayer", FlashType::ERROR);
		elseif	(!$allowed)			FlashMessage::add("Vous n'êtes pas autorisé à faire cette action", FlashType::ERROR);
		elseif	(!$loginSet)		FlashMessage::add("Veuillez entrer un nom d'utilisateur", FlashType::WARNING);
		elseif	(!$emailSet)		FlashMessage::add("Veuillez entrer une adresse email", FlashType::WARNING);
		elseif	(!$prenomSet)		FlashMessage::add("Veuillez entrer un prénom", FlashType::WARNING);
		elseif	(!$nomSet)			FlashMessage::add("Veuillez entrer un nom", FlashType::WARNING);
		elseif	(!$passwordSet)		FlashMessage::add("Veuillez entrer un mot de passe", FlashType::WARNING);
		elseif	(!$confirmSet)		FlashMessage::add("Veuillez confirmer votre mot de passe", FlashType::WARNING);
		elseif	(!$loginValid)		FlashMessage::add("Veuillez entrer un nom d'utilisateur valide (4 à 16 caractères alphanumériques)", FlashType::ERROR);
		elseif	(!$prenomValid)		FlashMessage::add("Veuillez entrer un prénom valide (2 à 16 caractères alphabétiques)", FlashType::ERROR);
		elseif	(!$nomValid)		FlashMessage::add("Veuillez entrer un nom valide (2 à 16 caractères alphabétiques)", FlashType::ERROR);
		elseif	(!$passwordValid)	FlashMessage::add("Veuillez entrer un mot de passe valide (3 à 128 caractères alphanumériques et spéciaux)", FlashType::ERROR);
		elseif	(!$confirmValid)	FlashMessage::add("Confirmation du mot de passe erroné", FlashType::ERROR);
		elseif	(!$available)		FlashMessage::add("Ce nom d'utilisateur n'est pas disponible", FlashType::ERROR);
		else
		{
			$_POST["unchecked"] = $_POST["email"];
			$_POST["email"] = null;
			$_POST["nonce"] = MotDePasse::genererChaineAleatoire(32);
			$_POST["password"] = MotDePasse::hacher($_POST["password"]);
			$_POST["admin"] = false;
			FlashMessage::add("Votre compte a été créé", FlashType::SUCCESS);
			VerificationEmail::envoiEmailValidation($_POST["login"], $_POST["nonce"]);
			parent::created();
			$success = true;
		}
		if (isset($success) || !$allowed) header("Location: frontController.php");
		else							  header("Location: frontController.php?controller=utilisateur&action=create");
	}
	
	public function check() : void
	{
		if (isset($_GET["login"]) && isset($_GET["nonce"]) && VerificationEmail::traiterEmailValidation($_GET["login"], $_GET["nonce"]))
		{
			FlashMessage::add("Votre adresse email a été vérifié", FlashType::SUCCESS);
		}
		else
		{
			FlashMessage::add("Un problème est survenu", FlashType::ERROR);
		}
		header("Location: frontController.php");
	}
	
	public function update() : void
	{
		if (ConnexionUtilisateur::estUtilisateur($_GET["login"]) || ConnexionUtilisateur::estAdministrateur()) parent::update();
		else
		{
			FlashMessage::add("Vous n'avez pas accès à cette page", FlashType::ERROR);
			header("Location: frontController.php");
		}
	}
	
	public function updated(): void										//ON NE DEVRAIT PAS POUVOIR CHANGER LE LOGIN
	{
		$loginSet		= isset($_POST["login"]) && $_POST["login"] != "";
		$prenomSet		= isset($_POST["prenom"]) && $_POST["prenom"] != "";
		$nomSet			= isset($_POST["nom"]) && $_POST["nom"] != "";
		$passwordSet	= isset($_POST["password"]) && $_POST["password"] != "";
		$newSet			= isset($_POST["new"]) && $_POST["new"] != "";
		$confirmSet		= isset($_POST["confirm"]) && $_POST["confirm"] != "";
		$loginValid		= $loginSet && preg_match("/[a-zA-Z0-9_]{4,16}/", $_POST["login"]);
		$prenomValid	= $prenomSet && preg_match("/[a-zA-Z]{2,16}/", $_POST["prenom"]);
		$nomValid		= $nomSet && preg_match("/[a-zA-Z]{2,16}/", $_POST["nom"]);
		$passwordValid	= $passwordSet && $loginSet && MotDePasse::verifier($_POST["password"], $this->getRepository()->select($_POST["login"])->getPassword());
		$newValid		= $newSet && preg_match("/.{3,128}/", $_POST["new"]);
		$confirmValid	= $newSet && $confirmSet && $_POST["new"] == $_POST["confirm"];
		$different		= $newSet && $loginSet && !MotDePasse::verifier($_POST["new"], $this->getRepository()->select($_POST["login"])->getPassword());
		$allowed		= $loginSet && ConnexionUtilisateur::estUtilisateur($_GET["login"]) || ConnexionUtilisateur::estAdministrateur();
		
		if		(!$allowed)			FlashMessage::add("Vous n'êtes pas autorisé à faire cette action", FlashType::ERROR);
		elseif	(!$loginSet)		FlashMessage::add("Veuillez entrer un nom d'utilisateur", FlashType::WARNING);
		elseif	(!$prenomSet)		FlashMessage::add("Veuillez entrer un prénom", FlashType::WARNING);
		elseif	(!$nomSet)			FlashMessage::add("Veuillez entrer un nom", FlashType::WARNING);
		elseif	(!$passwordSet)		FlashMessage::add("Veuillez entrer votre mot de passe", FlashType::WARNING);
		elseif	(!$newSet)			FlashMessage::add("Veuillez entrer un nouveau mot de passe", FlashType::WARNING);
		elseif	(!$confirmSet)		FlashMessage::add("Veuillez confirmer votre nouveau mot de passe", FlashType::WARNING);
		elseif	(!$loginValid)		FlashMessage::add("Veuillez entrer un nom d'utilisateur valide (4 à 16 caractères alphanumériques)", FlashType::ERROR);
		elseif	(!$prenomValid)		FlashMessage::add("Veuillez entrer un prénom valide (2 à 16 caractères alphabétiques)", FlashType::ERROR);
		elseif	(!$nomValid)		FlashMessage::add("Veuillez entrer un nom valide (2 à 16 caractères alphabétiques)", FlashType::ERROR);
		elseif	(!$passwordValid)	FlashMessage::add("Mot de passe erroné", FlashType::ERROR);
		elseif	(!$newValid)		FlashMessage::add("Veuillez entrer un nouveau mot de passe valide (3 à 128 caractères alphanumériques et spéciaux)", FlashType::ERROR);
		elseif	(!$confirmValid)	FlashMessage::add("Confirmation du nouveau mot de passe erroné", FlashType::ERROR);
		elseif	(!$different)		FlashMessage::add("Veuillez entrer un nouveau mot de passe différent", FlashType::ERROR);
		else
		{
			$_POST["password"] = MotDePasse::hacher($_POST["new"]);
			$_POST["admin"] = $this->getRepository()->select($_POST["login"])->isAdmin();
			FlashMessage::add("Votre profil a été modifié", FlashType::SUCCESS);
			parent::updated();
			$success = true;
		}
		if (isset($success) || !$allowed) header("Location: frontController.php");
		else							  header("Location: frontController.php?controller=utilisateur&action=update&login=" . $_POST["login"]);
	}
	
	public function delete() : void
	{
		if (ConnexionUtilisateur::estUtilisateur($_GET["login"]))
		{
			parent::delete();
			ConnexionUtilisateur::deconnecter();
		}
		elseif (ConnexionUtilisateur::estAdministrateur()) parent::delete();
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
															"path" => "utilisateur/connexion.php"]);
		}
		else
		{
			FlashMessage::add("Vous êtes déjà connecté", FlashType::ERROR);
			header("Location: frontController.php");
		}
	}
	
	public function connecter() : void
	{
		$loginSet		= isset($_POST["login"]) && $_POST["login"] != "";
		$passwordSet	= isset($_POST["password"]) && $_POST["password"] != "";
		$loginValid		= $loginSet && (new UtilisateurRepository)->select($_POST["login"]) != null ? true : false;
		$passwordValid	= $loginValid && $passwordSet ? MotDePasse::verifier($_POST["password"], $this->getRepository()->select($_POST["login"])->getPassword()) : false;
		$checked		= $loginValid && (new UtilisateurRepository)->select($_POST["login"])->getEmail() != "";
		$allowed		= !ConnexionUtilisateur::estConnecte();
		
		if		(!$allowed)			FlashMessage::add("Vous êtes déjà connecté", FlashType::ERROR);
		elseif	(!$loginSet)		FlashMessage::add("Veuillez entrer votre nom d'utilisateur", FlashType::WARNING);
		elseif	(!$passwordSet)		FlashMessage::add("Veuillez entrer votre mot de passe", FlashType::WARNING);
		elseif	(!$loginValid)		FlashMessage::add("Ce nom d'utilisateur n'existe pas", FlashType::ERROR);
		elseif	(!$passwordValid)	FlashMessage::add("Mot de passe erroné", FlashType::ERROR);
		elseif	(!$checked)			FlashMessage::add("Veuillez vérifier votre adresse mail", FlashType::INFO);
		else
		{
			FlashMessage::add("Vous êtes connecté", FlashType::SUCCESS);
			ConnexionUtilisateur::connecter($_POST["login"]);
			$success = true;
		}
		if (isset($success) || !$allowed) header("Location: frontController.php");
		else							  $this->connexion();
	}
	
	public function deconnecter() : void
	{
		if (ConnexionUtilisateur::estConnecte())
		{
			FlashMessage::add("Vous avez été déconnecté", FlashType::SUCCESS);
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