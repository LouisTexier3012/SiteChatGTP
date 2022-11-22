<?php

namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\AbstractDataObject;

abstract class AbstractRepository
{
	public abstract function getNomTable() : string;
	
	public abstract function getNomClePrimaire() : string;
	
	public abstract function getNomsColonnes() : array;
	
	protected abstract function construire(array $utilisateurFormatTableau) : AbstractDataObject;
	
	public abstract function isFirstLetterVowel() : bool;
	
	public abstract function isFeminine() : bool;
	
    public function selectAll(): array
    {
        $objects = [];
        $pdoStatement = DatabaseConnection::getPdo()->query('SELECT * FROM ' . $this->getNomTable());

        foreach ($pdoStatement as $object)
        {
            $objects[] = $this->construire($object);
        }
        return $objects;
    }

    public function select($valeurClePrimaire): ?AbstractDataObject
    {
        $pdoStatement = DatabaseConnection::getPdo()->prepare('SELECT * FROM ' . $this->getNomTable() .
                                                                    ' WHERE ' . $this->getNomClePrimaire() . ' = :' . $this->getNomClePrimaire());

        $values = array($this->getNomClePrimaire() => $valeurClePrimaire);
        $pdoStatement->execute($values);
        $voiture = $pdoStatement->fetch(); //fetch() renvoie false si pas de voiture correspondante

        if ($voiture != false) return static::construire($voiture);
        else                   return null;
    }

    public function create(AbstractDataObject $object)
    {
        $firstColumnSet = false;

        $sql = 'INSERT INTO ' . $this->getNomTable() . ' VALUES (';
        foreach ($this->getNomsColonnes() as $column) {

            if (!$firstColumnSet) {

                $sql .= ':' . $column;
                $firstColumnSet = true;
            } else $sql .= ', :' . $column;
        }
        $sql .= ')';

        $pdo = DatabaseConnection::getPdo()->prepare($sql);
        $pdo->execute($object->formatTableau());
    }

    public function update(AbstractDataObject $object): void
    {
        $firstColumnSet = false;

        $sql = 'UPDATE ' . $this->getNomTable() . ' SET ';
        foreach ($this->getNomsColonnes() as $column)
        {
            if (!$firstColumnSet)
            {
                $sql .= $column . ' = :' . $column;
                $firstColumnSet = true;
            }
            else $sql .= ', ' . $column . ' = :' . $column;
        }
        $sql .= ' WHERE ' . $this->getNomClePrimaire() . ' = :' . $this->getNomClePrimaire();

        $pdo = DatabaseConnection::getPdo()->prepare($sql);
        $pdo->execute($object->formatTableau());
    }

    public function delete($valeurClePrimaire): void
    {
        $pdoStatement = DatabaseConnection::getPdo()->prepare('DELETE FROM ' . $this->getNomTable() .
                                                                    ' WHERE ' . $this->getNomClePrimaire() . '=:valeurClePrimaire');
        $pdoStatement->execute(array("valeurClePrimaire" => $valeurClePrimaire));
    }
}