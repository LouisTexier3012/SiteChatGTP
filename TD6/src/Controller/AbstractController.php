<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\Repository\AbstractRepository;

abstract class AbstractController
{
    protected function afficheVue(string $cheminVue, array $parametres = []): void
    {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue
    }

    public function readAll() : void {

        $objects = $this->getRepository()->selectAll();    //appel au modèle pour gerer la BD
        $objectName = $this->getRepository()->getNomTable();
        $this->afficheVue('../view/view.php', ["pagetitle" => "Liste des objects",
                                                        "cheminVueBody" => "$objectName/list.php",
                                                        "objects" => $objects]);
    }

    public function create() : void {

        $objectName = $this->getRepository()->getNomTable();
        self::afficheVue('../view/view.php', ["pagetitle" => "Créer un object",
                                                        "cheminVueBody" => "$objectName/create.php"]);
    }
    
    public function read() : void {

        $repository = $this->getRepository();
        $objectName = $repository->getNomTable();
        $object = $repository->select($_GET[$repository->getNomClePrimaire()]);

        if (!is_null($object)) $this->afficheVue('../view/view.php', ["pagetitle" => "Détail de la object {$object->getImmatriculation()}",
                                                                                "cheminVueBody" => "$objectName/detail.php",
                                                                                "object" => $object]);
        else $this->afficheVue('../view/object/error.php', ['errorMessage' => "Cet object n'existe pas"]);
    }

    protected function delete() : void
    {
        $objectName = $this->getRepository()->getNomTable();
        $primaryKey = $this->getRepository()->getNomClePrimaire();
        $this->getRepository()->delete($primaryKey);
        $this->afficheVue('../view/view.php', ["pagetitle" => "Utilisateur supprimé",
                                                        "cheminVueBody" => "$objectName/deleted.php",
                                                        $primaryKey => $_GET[$primaryKey]]);
    }

    protected abstract function getRepository() : AbstractRepository;
}