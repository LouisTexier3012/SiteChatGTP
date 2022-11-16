<?php
//require_once __DIR__ . '/../model/Voiture.php'; // chargement du modèle

namespace App\Covoiturage\Controller;
use App\Covoiturage\Model\Voiture;

class ControllerVoiture {

    private static function afficheVue(string $cheminVue, array $parametres = []) : void {

        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue
    }

    //Déclaration de type de retour void : la fonction ne retourne pas de valeur
    public static function readAll() : void {

        $voitures = Voiture::getVoitures();    //appel au modèle pour gerer la BD
        self::afficheVue('../view/view.php', ["pagetitle" => "Liste des voitures",
														"cheminVueBody" => "voiture/list.php",
														"voitures" => $voitures]);
    }

    public static function read() : void {

        $voiture = Voiture::getVoitureParImmat($_GET['immatriculation']);

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
                                    $_GET['nbSieges']
        );
        $voiture->sauvegarder();
        self::afficheVue('../view/view.php', ["pagetitle" => "Confirmation de création",
                                                                "cheminVueBody" => "voiture/created.php",
                                                                "voiture" => $voiture]);
    }
}
?>