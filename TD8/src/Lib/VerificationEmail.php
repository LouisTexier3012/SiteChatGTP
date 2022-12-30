<?php

namespace App\Covoiturage\Lib;

use App\Covoiturage\Config\Conf;
use App\Covoiturage\Model\DataObject\Utilisateur;
use App\Covoiturage\Model\Repository\UtilisateurRepository;

class VerificationEmail
{
	public static function envoiEmailValidation($login, $nonce): void
	{
		$loginURL = rawurlencode($login);
		$nonceURL = rawurlencode($nonce);
		$absoluteURL = Conf::getAbsoluteURL();
		$lienValidationEmail = "$absoluteURL?controller=utilisateur&action=check&login=$loginURL&nonce=$nonceURL";
		$corpsEmail = "<a href=\"$lienValidationEmail\">Validation</a>";
		
		// Temporairement avant d'envoyer un vrai mail
		FlashMessage::add($corpsEmail, FlashType::SUCCESS);
	}
	
	/**
	 * @param $login
	 * @param $nonce
	 * @return bool
	 *
	 */
	public static function traiterEmailValidation($login, $nonce): bool
	{
		$utilisateur = (new UtilisateurRepository)->select($login);
		
		if ($utilisateur != null && $nonce == $utilisateur->getNonce())
		{
			$utilisateur->setEmail($utilisateur->getUnchecked());
			$utilisateur->setUnchecked(null);
			$utilisateur->setNonce(null);
			(new UtilisateurRepository)->update($utilisateur);
			return true;
		}
		else return false;
	}
	
	public static function aValideEmail(Utilisateur $utilisateur) : bool
	{
		// À compléter
		return true;
	}
}