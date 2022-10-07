<?php

require_once 'Model.php';
require_once 'Voiture.php';
require_once 'Trajet.php';
require_once 'Utilisateur.php';

foreach (ModelVoiture::getVoitures() as $voiture) {

    $voiture->afficher();
}