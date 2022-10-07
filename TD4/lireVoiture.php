<?php

require_once 'Model.php';
require_once 'Voiture.php';

foreach (ModelVoiture::getVoitures() as $voiture) {

    $voiture->afficher();
}

$voiture = ModelVoiture::getVoitureParImmat('101EF11');

if (!is_null($voiture)) $voiture->afficher();

$voiture = new ModelVoiture("Ferrari", "rose", "667EK19", "8");

$voiture->afficher();
$voiture->sauvegarder();