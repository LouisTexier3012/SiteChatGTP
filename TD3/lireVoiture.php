<?php

require_once 'Model.php';
require_once 'Voiture.php';

foreach (Voiture::getVoitures() as $voiture) {

    $voiture->afficher();
}

$voiture = Voiture::getVoitureParImmat('101EF11');

if (!is_null($voiture)) $voiture->afficher();

$voiture = new Voiture("Ferrari", "rose", "667EK19", "8");

$voiture->afficher();
$voiture->sauvegarder();