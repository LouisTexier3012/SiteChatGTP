<?php
/** @var \App\Covoiturage\Model\DataObject\Trajet $trajet */
if (!is_null($trajet)) {

    $id = $trajet->getId();
    $departHTML = htmlspecialchars($trajet->getDepart());
    $arriveeHTML = htmlspecialchars($trajet->getArrivee());
    $date = $trajet->getDate();
    $nbPlaces = $trajet->getDate();
    $prix = $trajet->getPrix();
    $conducteurLoginHTML = htmlspecialchars($trajet->getConducteurLogin());

    echo "<p>Trajet N°$id, $departHTML-$arriveeHTML se déroulant le $date, le conducteur $conducteurLoginHTML propose $prix<p>";
}
else echo "Pas de trajet";