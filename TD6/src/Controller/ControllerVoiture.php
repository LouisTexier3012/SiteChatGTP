<?php
namespace App\Covoiturage\Controller;
use App\Covoiturage\Model\DataObject\Voiture;
use App\Covoiturage\Model\Repository\AbstractRepository;
use App\Covoiturage\Model\Repository\VoitureRepository;

class ControllerVoiture {

    private static function afficheVue(string $cheminVue, array $parametres = []) : void {

        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue
    }

    //Déclaration de type de retour void : la fonction ne retourne pas de valeur
    public static function readAll() : void {

        $voitures = (new VoitureRepository)->selectAll();    //appel au modèle pour gerer la BD
        self::afficheVue('../view/view.php', ["pagetitle" => "Liste des voitures",
														"cheminVueBody" => "voiture/list.php",
														"voitures" => $voitures]);
    }

    public static function read() : void {

        $voiture = (new VoitureRepository)->select($_GET['immatriculation']);

        if (!is_null($voiture)) self::afficheVue('../view/view.php', ["pagetitle" => "Détail de la voiture {$voiture->getImmatriculation()}",
																				"cheminVueBody" => "voiture/detail.php",
																				"voiture" => $voiture]);
        else self::afficheVue('../view/voiture/error.php');
    }

    public static function create() : void {

        self::afficheVue('../view/view.php', ["pagetitle" => "Créer une voiture",
														"cheminVueBody" => "voiture/create.php"]);
    }

    public static function created() : void {

        $voiture = new Voiture($_GET['marque'],
                               $_GET['couleur'],
                               $_GET['immatriculation'],
                               $_GET['nbSieges']);
        VoitureRepository::sauvegarder($voiture);
        self::afficheVue('../view/view.php', ["pagetitle" => "Voiture créée",
                                                                "cheminVueBody" => "voiture/created.php",
                                                                "voiture" => $voiture]);
    }

    public static function error(String $errorMessage) : void {

        self::afficheVue('../view/view.php', ["pagetitle" => "Page d'erreur",
                                                        "cheminVueBody" => "voiture/error.php",
                                                        "errorMessage" => $errorMessage]);
    }

    public static function delete() : void {

        (new VoitureRepository)->delete($_GET['immatriculation']);

        self::afficheVue('../view/view.php', ["pagetitle" => "Voiture supprimée",
                                                        "cheminVueBody" => "voiture/deleted.php",
                                                        "immatriculation" => $_GET['immatriculation']]);
    }

    public static function update() : void {

        self::afficheVue('../view/view.php', ["pagetitle" => "Modification de voiture",
                                                        "cheminVueBody" => "voiture/update.php",
                                                        "voiture" => (new VoitureRepository())->select($_GET['immatriculation'])]);
    }

    public static function updated() : void {

        (new VoitureRepository())->update(new Voiture($_GET['marque'],
                                                      $_GET['couleur'],
                                                      $_GET['immatriculation'],
                                                      $_GET['nbSieges']));

        self::afficheVue('../view/view.php', ["pagetitle" => "Voiture modifiée",
                                                        "cheminVueBody" => "voiture/updated.php",
                                                        "immatriculation" => $_GET['immatriculation']]);
    }
}