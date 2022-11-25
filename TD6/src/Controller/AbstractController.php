<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\Repository\AbstractRepository;

abstract class AbstractController
{
	protected abstract function getRepository() : AbstractRepository;
	
    protected function afficheVue(string $cheminVue, array $parametres = []): void
    {
        extract($parametres);
        require __DIR__ . "/../view/$cheminVue";
    }

	/**
	 * @noinspection PhpUnused
	 */
    public function readAll() : void {

        $objects = $this->getRepository()->selectAll();
        $objectName = $this->getRepository()->getNomTable();

		self::afficheVue('../view/view.php',	["pagetitle" => "Liste des $objectName" . "s",
                                                         "cheminVueBody" => "$objectName/list.php",
                                                         "$objectName" . "s" => $objects]);
    }

	/**
	 * @noinspection PhpUnused
	 */
    public function create() : void {

		$repository = $this->getRepository();
        $objectName = $repository->getNomTable();
		
		if		($repository->isFeminine())			$pagetitle = "Ajouter une nouvelle $objectName";
		elseif	($repository->isFirstLetterVowel())	$pagetitle = "Ajouter un nouvel $objectName";
		else										$pagetitle = "Ajouter un nouveau $objectName";
		
        self::afficheVue('../view/view.php',	["pagetitle" => "$pagetitle",
        												 "cheminVueBody" => "$objectName/create.php"]);
    }

	/**
	 * @noinspection PhpUnused
	 */
	public function created(): void
	{
		$repository = $this->getRepository();
		$columns = $repository->getNomsColonnes();
		$objectName = $repository->getNomTable();
		
		$objectArray = [];
		foreach ($columns as $column) $objectArray[$column] = $_GET[$column];
		
		$object = $repository->construire($objectArray);
		$repository->create($object);
		
		if		($repository->isFeminine())			$pagetitle = "Ajouter une nouvelle $objectName";
		elseif	($repository->isFirstLetterVowel())	$pagetitle = "Ajouter un nouvel $objectName";
		else										$pagetitle = "Ajouter un nouveau $objectName";
		
		self::afficheVue('../view/view.php',	["pagetitle" => "$pagetitle",
														 "cheminVueBody" => "$objectName/created.php",
														 "$objectName" => $object]);
	}

	/**
	 * @noinspection PhpUnused
	 */
    public function read() : void
	{
        $repository = $this->getRepository();
        $objectName = $repository->getNomTable();
        $object = $repository->select($_GET[$repository->getNomClePrimaire()]);
	
		if		($repository->isFirstLetterVowel())	$pagetitle = "Détail de l'$objectName";
		elseif	($repository->isFeminine())			$pagetitle = "Détail de la $objectName";
		else										$pagetitle = "Détail du $objectName";
		
        if (!is_null($object))
		{
			self::afficheVue('../view/view.php',	["pagetitle" => "$pagetitle",
															 "cheminVueBody" => "$objectName/detail.php",
															 "$objectName" => $object]);
		}
        else $this->error("Cette page n'existe pas");
    }

	/**
	 * @noinspection PhpUnused
	 */
    public function update(): void
    {
		$repository = $this->getRepository();
		$objectName = $repository->getNomTable();
		$primaryKey = $repository->getNomClePrimaire();
	
		if		($repository->isFirstLetterVowel())	$pagetitle = "Modification de l'$objectName";
		elseif	($repository->isFeminine())			$pagetitle = "Modification de la $objectName";
		else										$pagetitle = "Modification du $objectName";
		
		self::afficheVue('../view/view.php',	["pagetitle" => "$pagetitle",
														 "cheminVueBody" => "$objectName/update.php",
														 "$objectName" => $repository->select($_GET["$primaryKey"])]);
    }

	/**
	 * @noinspection PhpUnused
	 */
	public function updated(): void
	{
		$repository = $this->getRepository();
		$columns = $repository->getNomsColonnes();
		$objectName = $repository->getNomTable();
		
		$objectArray = [];
		foreach ($columns as $column)
		{
			$objectArray[$column] = $_GET[$column];
		}
		
		$object = $repository->construire($objectArray);
		$repository->update($object);
	
		if	($repository->isFeminine())	$pagetitle = "$objectName modifiée avec succès";
		else							$pagetitle = "$objectName modifié avec succès";
		
		self::afficheVue('../view/view.php',	["pagetitle" => "$pagetitle",
														 "cheminVueBody" => "$objectName/updated.php",
														 "$objectName" => $object]);
	}

	/**
	 * @noinspection PhpUnused
	 */
    public function delete() : void
    {
		$repository = $this->getRepository();
        $objectName = $repository->getNomTable();
        $primaryKey = $repository->getNomClePrimaire();
		$repository->delete($primaryKey);

		if	($repository->isFeminine())	$pagetitle = ucfirst($objectName) . "supprimée avec succès";
		else							$pagetitle = "$objectName supprimé avec succès";
	
		self::afficheVue('../view/view.php',	["pagetitle" => "$pagetitle",
														 "cheminVueBody" => "$objectName/deleted.php",
														 "$primaryKey" => $_GET[$primaryKey]]);
    }

	public function error(string $message) : void
	{
		self::afficheVue('../view/view.php',	["pagetitle" => "Page d'erreur",
														 "cheminVueBody" => "error.php",
														 "message" => $message]);
	}
}