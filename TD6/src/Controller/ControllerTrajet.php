<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\DataObject\Trajet;
use App\Covoiturage\Model\Repository\AbstractRepository;
use App\Covoiturage\Model\Repository\TrajetRepository;
use App\Covoiturage\Controller\AbstractController;

class ControllerTrajet extends AbstractController
{
    public static function error(string $errorMessage): void
    {
        self::afficheVue('../view/view.php', ["pagetitle" => "Page d'erreur",
                                                        "cheminVueBody" => "trajet/error.php",
                                                        "errorMessage" => $errorMessage]);
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

    protected function getRepository(): AbstractRepository
    {
        return new TrajetRepository();
    }
}