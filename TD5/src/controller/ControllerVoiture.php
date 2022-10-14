<?php
require_once __DIR__ . '../model/ModelVoiture.php'; // chargement du modèle

class ControllerVoiture {

    private static function afficheVue(string $cheminVue, array $parametres = []) : void {

        extract($parametres); // Crée des variables à partir du tableau $parametres
        require "../view/$cheminVue"; // Charge la vue
    }

    //Déclaration de type de retour void : la fonction ne retourne pas de valeur
    public static function readAll() : void {

        $voitures = ModelVoiture::getVoitures();    //appel au modèle pour gerer la BD
        self::afficheVue('../view/voiture/list.php', ["voitures" => $voitures]);
    }

    public static function read() : void {

        $voiture = ModelVoiture::getVoitureParImmat($_GET['immatriculation']);

        if (!is_null($voiture)) self::afficheVue('../view/voiture/detail.php', ["voiture" => $voiture]);
        else self::afficheVue('../view/voiture/error.php');
    }

    public static function create() : void {

        self::afficheVue('../view/voiture/create.php');
    }

    public static function created() : void {

        $voiture = new ModelVoiture($_GET['marque'],
                                    $_GET['couleur'],
                                    $_GET['immatriculation'],
                                    $_GET['nbSieges']
        );
        $voiture->sauvegarder();
        self::readAll();
    }
}
?>