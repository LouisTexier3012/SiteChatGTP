<?php
/** @var Utilisateur $voiture */
if (!is_null($voiture)) {

    $immatriculationHTML = htmlspecialchars($voiture->getImmatriculation());
    $marqueHTML = htmlspecialchars($voiture->getMarque());
    $couleurHTML = htmlspecialchars($voiture->getCouleur());
    $nbSiegesHTML = htmlspecialchars($voiture->getNbSieges());
    $modelHTML = htmlspecialchars($voiture->getModel());

    echo "<div style='display: flex; justify-content: center; align-content: center'><p style='margin-right: 1px'>Voiture $immatriculationHTML de marque $marqueHTML model $modelHTML (</p><div style='background-color: $couleurHTML; width: 10px; height: 10px; align-self: center'></div><p>, $nbSiegesHTML sieges)</p></div>";
}
else {

    echo "Pas de voiture";
}

