<?php
require_once 'Voiture.php';
require_once 'Model.php';
$voiture = new ModelVoiture($_POST['marque'], $_POST['couleur'], $_POST['immatriculation'], $_POST['nbSieges']);
$voiture->sauvegarder();
?>

