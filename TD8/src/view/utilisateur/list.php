<?php

/* @var \App\Covoiturage\Model\DataObject\Utilisateur[] $utilisateurs*/

echo '
	<li>
			<a href="frontController.php?controller=utilisateur&action=create">Ajouter une nouvel utilisateur</a>
			<a href="frontController.php?controller=utilisateur&action=create"><img src="../assets/svg/add.svg" alt="add"/></a>
	</li>
';

foreach ($utilisateurs as $utilisateur) {
	$loginURL = rawurlencode($utilisateur->getLogin());
	$loginHTML = htmlspecialchars($utilisateur->getLogin());
	$prenomHTML = htmlspecialchars($utilisateur->getPrenom());
	$nomHTML = htmlspecialchars($utilisateur->getNom());

	echo '<li>
            <p>
                Utilisateur <a href="frontController.php?controller=utilisateur&action=read&login='.$loginURL.'">'.$prenomHTML.' '.$nomHTML.'</a>
            </p>
            <div>
                <a href="frontController.php?controller=utilisateur&action=update&login=' . $loginURL . '"><img src="../assets/svg/pen.svg" alt="pen"/></a>
                <a href="frontController.php?controller=utilisateur&action=delete&login=' . $loginURL . '"><img src="../assets/svg/cross.svg" alt="cross"/></a>
            </div>
        </li>
	';
}