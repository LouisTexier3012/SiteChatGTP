<?php

namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\AbstractDataObject;

abstract class AbstractRepository
{
	public abstract function getNomTable() : string;
	
	public abstract function getNomClePrimaire() : string;
	
	public abstract function getNomsColonnes() : array;
	
	protected abstract function construire(array $utilisateurArray) : AbstractDataObject;
	
	public abstract function isFirstLetterVowel() : bool;
	
	public abstract function isFeminine() : bool;
	
    public function selectAll(): array
    {
        $pdo = DatabaseConnection::getPdo()->query('SELECT * FROM ' . $this->getNomTable());

        foreach ($pdo as $object)
        {
            $objects[] = $this->construire($object);
        }
        return $objects ?? [];
    }

    public function select($valeurClePrimaire): ?AbstractDataObject
    {
        $pdo = DatabaseConnection::getPdo()->prepare('SELECT * FROM ' . $this->getNomTable() .
                                                                    ' WHERE ' . $this->getNomClePrimaire() . ' = :' . $this->getNomClePrimaire());

        $values = array($this->getNomClePrimaire() => $valeurClePrimaire);

        $pdo->execute($values);
        $object = $pdo->fetch(); //fetch() renvoie false si pas de object correspondant

        if ($object != false) return static::construire($object);
        else				  return null;
    }

    public function create(AbstractDataObject $object)
    {
        $sql = 'INSERT INTO ' . $this->getNomTable() . '(';
	
		$firstColumnSet = false;
        foreach ($this->getNomsColonnes() as $column) {
		
			!$firstColumnSet ? $sql .= $column : $sql .= ', ' . $column;
			$firstColumnSet = true;
		}
		$sql .= ') VALUES (';
  
		$firstColumnSet = false;
        foreach ($this->getNomsColonnes() as $column) {

            !$firstColumnSet ? $sql .= ':' . $column : $sql .= ', :' . $column;
            $firstColumnSet = true;
        }
        $sql .= ')';
        $pdo = DatabaseConnection::getPdo()->prepare($sql);
        $pdo->execute($object->formatTableau());
    }

    public function update(AbstractDataObject $object): void
    {
        $sql = 'UPDATE ' . $this->getNomTable() . ' SET ';
	
		$firstColumnSet = false;
		foreach ($this->getNomsColonnes() as $column) {
		
			!$firstColumnSet ? $sql .= $column . ' = :' . $column : $sql .= ', ' . $column . ' = :' . $column;
			$firstColumnSet = true;
		}
		$sql .= ' WHERE ' . $this->getNomClePrimaire() . ' = :' . $this->getNomClePrimaire();
		
        $pdo = DatabaseConnection::getPdo()->prepare($sql);
        $pdo->execute($object->formatTableau());
    }

    public function delete($valeurClePrimaire): void
    {
		$sql = 'DELETE FROM ' . $this->getNomTable() .
				' WHERE ' . $this->getNomClePrimaire() . '=:valeurClePrimaire';

        $pdo = DatabaseConnection::getPdo()->prepare($sql);
        $pdo->execute(array("valeurClePrimaire" => $valeurClePrimaire));
    }
}