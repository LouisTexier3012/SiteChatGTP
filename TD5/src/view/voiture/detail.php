<?php
/** @var Utilisateur $voiture */
if (!is_null($voiture)) {

    $immatriculationHTML = htmlspecialchars($voiture->getImmatriculation());
    $marqueHTML = htmlspecialchars($voiture->getMarque());
    $couleurHTML = htmlspecialchars($voiture->getCouleur());
    $nbSiegesHTML = htmlspecialchars($voiture->getNbSieges());

    echo "<p>Voiture $immatriculationHTML de marque $marqueHTML (couleur $couleurHTML, $nbSiegesHTML sieges)<p>";
}
else {

    echo "Pas de voiture";
}

