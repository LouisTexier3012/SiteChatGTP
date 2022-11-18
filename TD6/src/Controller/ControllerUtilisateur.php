<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\Repository\UtilisateurRepository;

class ControllerUtilisateur {

	private static function afficheVue(string $cheminVue, array $parametres = []) : void {

		extract($parametres); // Crée des variables à partir du tableau $parametres
		require __DIR__ . "/../view/$cheminVue"; // Charge la vue
	}

	public static function readAll() : void {

		$utilisateurs = (new UtilisateurRepository)->selectAll();    //appel au modèle pour gerer la BD
		self::afficheVue('../view/view.php', ["pagetitle" => "Liste des utilisateurs",
														"cheminVueBody" => "utilisateur/list.php",
														"utilisateurs" => $utilisateurs]);
	}

	public static function error(String $errorMessage) : void {

		self::afficheVue('../view/view.php', ["pagetitle" => "Page d'erreur",
														"cheminVueBody" => "utilisateur/error.php",
														"errorMessage" => $errorMessage]);
	}
}