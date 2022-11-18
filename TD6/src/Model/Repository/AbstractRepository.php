<?php

namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\AbstractDataObject;

abstract class AbstractRepository {

	/**
	 * @return AbstractDataObject[]
	 */
	public function selectAll(): array {

		$objects = [];
		$pdoStatement = DatabaseConnection::getPdo()->query('SELECT * FROM $getNomTable()');

		foreach ($pdoStatement as $object) {

			$objects[] = $this->construire($object);
		}
		return $objects;
	}

	public function select($valeurClePrimaire) : ?AbstractDataObject {

		$pdoStatement = DatabaseConnection::getPdo()->prepare('SELECT * FROM $getNomTable WHERE immatriculation = :immatriculation');

		$values = array("immatriculation" => $valeurClePrimaire);
		$pdoStatement->execute($values);
		$voiture = $pdoStatement->fetch(); //fetch() renvoie false si pas de voiture correspondante

		if ($voiture != false) return static::construire($voiture);
		else				   return null;
	}

	protected abstract function getNomTable() : String;

	protected abstract function getNomClePrimaire(): string;

	protected abstract function construire(array $objetFormatTableau) : AbstractDataObject;
}