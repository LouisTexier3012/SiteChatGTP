<?php

namespace App\Covoiturage\Model\Repository;
use App\Covoiturage\Model\DataObject\AbstractDataObject;
use App\Covoiturage\Model\DataObject\Utilisateur;

class UtilisateurRepository extends AbstractRepository {

//	public static function getUtilisateurs() : array {
//
//		$utilisateurs = [];
//		$pdoStatement = DatabaseConnection::getPdo()->query("SELECT * FROM utilisateur");
//
//		foreach ($pdoStatement as $utilisateur) {
//
//			$utilisateurs[] = new Utilisateur($utilisateur['login'], $utilisateur['nom'], $utilisateur['prenom']);
//		}
//		return $utilisateurs;
//	}

	protected function getNomTable(): string {
		return 'utilisateur';
	}

	protected function construire(array $objetFormatTableau): AbstractDataObject
	{
		// TODO: Implement construire() method.
	}
}