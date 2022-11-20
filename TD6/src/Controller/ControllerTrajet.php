<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\DataObject\Trajet;
use App\Covoiturage\Model\Repository\TrajetRepository;

class ControllerTrajet
{

    private static function afficheVue(string $cheminVue, array $parametres = []): void
    {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue
    }

    public static function readAll(): void
    {
        $trajets = (new TrajetRepository)->selectAll();    //appel au modèle pour gerer la BD
        self::afficheVue('../view/view.php', ["pagetitle" => "Liste des trajets",
                                                        "cheminVueBody" => "trajet/list.php",
                                                        "trajets" => $trajets]);
    }

    public static function read(): void
    {
        $trajet = (new TrajetRepository)->select($_GET['id']);
        if (!is_null($trajet)) self::afficheVue('../view/view.php', ["pagetitle" => "Détail du trajet {$trajet->getId()}",
                                                                               "cheminVueBody" => "trajet/detail.php",
                                                                               "trajet" => $trajet]);
    }

    public static function error(string $errorMessage): void
    {
        self::afficheVue('../view/view.php', ["pagetitle" => "Page d'erreur",
                                                        "cheminVueBody" => "trajet/error.php",
                                                        "errorMessage" => $errorMessage]);
    }

    public static function create(): void
    {
        self::afficheVue('../view/view.php', ["pagetitle" => "Créer un trajet",
                                                        "cheminVueBody" => "trajet/create.php"]);
    }

    public static function created(): void
    {
        $trajet = new Trajet($_GET['id'],
                             $_GET['depart'],
                             $_GET['arrivee'],
                             $_GET['date'],
                             $_GET['nbPlaces'],
                             $_GET['prix'],
                             $_GET['conducteurLogin']);
        (new TrajetRepository)->create($trajet);
        self::afficheVue('../view/view.php', ["pagetitle" => "Trajet créé",
                                                        "cheminVueBody" => "trajet/created.php",
                                                        "trajet" => $trajet]);
    }

    public static function update(): void
    {
        self::afficheVue('../view/view.php', ["pagetitle" => "Modification du trajet",
                                                        "cheminVueBody" => "trajet/update.php",
                                                        "trajet" => (new TrajetRepository)->select($_GET['id'])]);
    }

    public static function updated(): void
    {
        $trajet = new Trajet($_GET['id'],
                             $_GET['depart'],
                             $_GET['arrivee'],
                             $_GET['date'],
                             $_GET['nbPlaces'],
                             $_GET['prix'],
                             $_GET['conducteurLogin']);
        (new TrajetRepository)->update($trajet);
        self::afficheVue('../view/view.php', ["pagetitle" => "Trajet modifié",
                                                        "cheminVueBody" => "trajet/updated.php",
                                                        "trajet" => $trajet]);
    }

    public static function delete(): void
    {
        (new TrajetRepository())->delete($_GET['id']);
        self::afficheVue('../view/view.php', ["pagetitle" => "Trajet supprimé",
                                                        "cheminVueBody" => "trajet/deleted.php",
                                                        "id" => $_GET['id']]);
    }
}