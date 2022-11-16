<?php

namespace App\Covoiturage\Controller;
use App\Covoiturage\Model\DataObject\Voiture;
use App\Covoiturage\Model\Repository\VoitureRepository;

class ControllerVoiture {

    private static function afficheVue(string $cheminVue, array $parametres = []) : void {

        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue
    }

    //Déclaration de type de retour void : la fonction ne retourne pas de valeur
    public static function readAll() : void {

        $voitures = VoitureRepository::getVoitures();    //appel au modèle pour gerer la BD
        self::afficheVue('../view/view.php', ["pagetitle" => "Liste des voitures",
														"cheminVueBody" => "voiture/list.php",
														"voitures" => $voitures]);
    }

    public static function read() : void {

        $voiture = VoitureRepository::getVoitureParImmat($_GET['immatriculation']);

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
        self::afficheVue('../view/view.php', ["pagetitle" => "Confirmation de création",
                                                                "cheminVueBody" => "voiture/created.php",
                                                                "voiture" => $voiture]);
    }

    public static function error(String $errorMessage) : void {

        self::afficheVue('../view/view.php', ["pagetitle" => "Page d'erreur",
                                                        "cheminVueBody" => "voiture/error.php",
                                                        "errorMessage" => $errorMessage]);
    }

    public static function delete() : void {

        VoitureRepository::supprimerParImmatriculation($_GET['immatriculation']);

        self::afficheVue('../view/view.php', ["pagetitle" => "Confirmation de suppression",
                                                        "cheminVueBody" => "voiture/deleted.php",
                                                        "immatriculation" => $_GET['immatriculation']]);
    }

    public static function update() : void {

        self::afficheVue('../view/view.php', ["pagetitle" => "Modification de voiture",
                                                        "cheminVueBody" => "voiture/update.php",
                                                        "voiture" => VoitureRepository::getVoitureParImmat($_GET['immatriculation'])]);
    }

    public static function updated() : void {

        /*
        VoitureRepository::mettreAJour(VoitureRepository::construire(["immatriculation" => $_GET['immatriculation'],
                                                                      "marque" => $_GET['marque'],
                                                                      "couleur" => $_GET['couleur'],
                                                                      "nbSieges" => $_GET['nbSieges']]));
        */
        VoitureRepository::mettreAJour(new Voiture($_GET['marque'],
                                                   $_GET['couleur'],
                                                   $_GET['immatriculation'],
                                                   $_GET['nbSieges']));

        self::afficheVue('../view/view.php', ["pagetitle" => "Confirmation de modification",
                                                        "cheminVueBody" => "voiture/updated.php",
                                                        "immatriculation" => $_GET['immatriculation']]);
    }
}
?>