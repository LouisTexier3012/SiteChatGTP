<?php

require_once 'Model.php';
require_once 'Voiture.php';

foreach (Utilisateur::getVoitures() as $voiture) {

    $voiture->afficher();
}

$voiture = Utilisateur::getVoitureParImmat('101EF11');

if (!is_null($voiture)) $voiture->afficher();

$voiture = new Utilisateur("Ferrari", "rose", "667EK19", "8");

$voiture->afficher();
$voiture->sauvegarder();