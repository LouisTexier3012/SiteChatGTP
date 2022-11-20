<?php
/** @var \App\Covoiturage\Model\DataObject\Utilisateur $utilisateur */
if (!is_null($utilisateur)) {

    $loginHTML = htmlspecialchars($utilisateur->getLogin());
    $prenomHTML = htmlspecialchars($utilisateur->getPrenom());
    $nomHTML = htmlspecialchars($utilisateur->getNom());

    echo "<p>Utilisateur $loginHTML de prénom $prenomHTML et nom $nomHTML<p>";
}
else echo "Pas d'utilisateur";