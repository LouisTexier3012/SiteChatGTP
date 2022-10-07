<?php
require_once ('../model/ModelVoiture.php'); // chargement du modèle
class ControllerVoiture {
    // Déclaration de type de retour void : la fonction ne retourne pas de valeur
    public static function readAll() : void {
        $voitures = ModelVoiture::getVoitures(); //appel au modèle pour gerer la BD
        require ('../view/voiture/list.php');  //"redirige" vers la vue
    }
}
?>