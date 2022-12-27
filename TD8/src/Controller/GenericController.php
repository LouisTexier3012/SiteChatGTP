<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Lib\FlashMessage;
use App\Covoiturage\Lib\FlashType;
use App\Covoiturage\Lib\MotDePasse;
use App\Covoiturage\Lib\PreferenceController;

class GenericController
{
	protected function afficheVue(string $cheminVue, array $parametres = []): void
	{
		extract($parametres);
		require __DIR__ . "/../view/$cheminVue";
	}
	
	public function readAll() : void
	{
		$objects = $this->getRepository()->selectAll();
		$objectName = $this->getRepository()->getNomTable();

		self::afficheVue('../view/view.php', ["pagetitle" => "Liste des $objectName" . "s",
														"cheminVueBody" => "$objectName/list.php",
														"$objectName" . "s" => $objects]);
	}
	
	public function create() : void {

		$repository = $this->getRepository();
		$objectName = $repository->getNomTable();
	
		if		($repository->isFeminine())			$pagetitle = "Ajouter une nouvelle $objectName";
		elseif	($repository->isFirstLetterVowel())	$pagetitle = "Ajouter un nouvel $objectName";
		else										$pagetitle = "Ajouter un nouveau $objectName";
	
		self::afficheVue('../view/view.php', ["pagetitle" => "$pagetitle",
														"cheminVueBody" => "$objectName/create.php"]);
	}
	
	public function created(): void
	{
		$repository = $this->getRepository();
		$columns = $repository->getNomsColonnes();
		$objectName = $repository->getNomTable();
		
		foreach ($columns as $column)
		{
			//if (isset($_POST[$column]))
			$objectArray[$column] = $_POST[$column];
			echo $column;
		}
		$object = $repository->construire($objectArray);
		$repository->create($object);
		
		header("Location: frontController.php");
	}
	
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
			self::afficheVue('../view/view.php', ["pagetitle" => "$pagetitle",
															"cheminVueBody" => "$objectName/detail.php",
															"$objectName" => $object]);
		}
		else $this->error("Cette page n'existe pas");
	}
	
	public function update(): void
	{
		$repository = $this->getRepository();
		$objectName = $repository->getNomTable();
		$primaryKey = $repository->getNomClePrimaire();
	
		if		($repository->isFirstLetterVowel())	$pagetitle = "Modification de l'$objectName";
		elseif	($repository->isFeminine())			$pagetitle = "Modification de la $objectName";
		else										$pagetitle = "Modification du $objectName";
	
		self::afficheVue('../view/view.php', ["pagetitle" => "$pagetitle",
														"cheminVueBody" => "$objectName/update.php",
														"$objectName" => isset($_GET["$primaryKey"]) ? $repository->select(strtolower($_GET["$primaryKey"])) : $repository->select(strtolower($_POST["$primaryKey"]))]);
	}
	
	public function updated(): void
	{
		$repository = $this->getRepository();
		$columns = $repository->getNomsColonnes();
		
		foreach ($columns as $column)
		{
			//if (isset($_POST[$column]))
			$objectArray[$column] = $_POST[$column];
		}
		$object = $repository->construire($objectArray);
		$repository->update($object);
		
		header("Location: frontController.php");
	}
	
	public function delete() : void
	{
		$repository = $this->getRepository();
		$objectName = $repository->getNomTable();
		$repository->delete(strtolower($_GET[$repository->getNomClePrimaire()]));
		
		if	($repository->isFeminine())	FlashMessage::add(ucfirst($objectName) . " supprimée avec succès", FlashType::SUCCESS);
		else							FlashMessage::add(ucfirst($objectName) . " supprimé avec succès", FlashType::SUCCESS);
		
		header("Location: frontController.php");
	}
	
	public function formulairePreference() : void
	{
		self::afficheVue("../view/view.php", ["pagetitle" => "Formulaire de préférence",
														"cheminVueBody" => "formulairePreference.php"]);
	}
	
	public function enregistrerPreference() : void
	{
		PreferenceController::enregistrer(ucfirst(strtolower($_POST["controller"])));
        FlashMessage::add("Préférence du controller enregistrée avec succès !", FlashType::SUCCESS);
        header("Location: frontController.php");
	}
}