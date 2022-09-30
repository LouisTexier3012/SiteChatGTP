<?php

require_once 'Model.php';
require_once 'Voiture.php';

foreach (Voiture::getVoitures() as $voiture) {

    $voiture->afficher();
}