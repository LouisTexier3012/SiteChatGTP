<?php

/* @var \App\Covoiturage\Model\DataObject\Utilisateur[] $utilisateurs*/

use App\Covoiturage\Lib\ConnexionUtilisateur;

foreach ($utilisateurs as $utilisateur) {
	$login = rawurlencode($utilisateur->getLogin());
	$prenom = htmlspecialchars($utilisateur->getPrenom());
	$nom = htmlspecialchars($utilisateur->getNom());

	if (ConnexionUtilisateur::estUtilisateur($login))
	{
		echo "
		<li>
			<p>Utilisateur <a href=\"frontController.php?controller=utilisateur&action=read&login=$login\">$prenom $nom</a></p>
			<div>
                <a href=\"frontController.php?controller=utilisateur&action=update&login=$login\"><img src=\"../assets/svg/pen.svg\" alt=\"pen\"/></a>
                <a href=\"frontController.php?controller=utilisateur&action=delete&login=$login\"><img src=\"../assets/svg/cross.svg\" alt=\"cross\"/></a>
            </div>
		</li>";
	
	}
	else
	{
		echo "
		<li>
            <p>Utilisateur <a href=\"frontController.php?controller=utilisateur&action=read&login=$login\">$prenom $nom</a></p>
        </li>";
	}
}