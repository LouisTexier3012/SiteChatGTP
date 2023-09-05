<?php

/* @var Utilisateur[] $voitures*/

echo '
	<li>
			<a href="frontController.php?controller=voiture&action=create">Ajouter une nouvelle voiture</a>
			<a href="frontController.php?controller=voiture&action=create"><img src="../assets/svg/add.svg" alt="add"/></a>
	</li>
';

foreach ($voitures as $voiture) {
	$immatriculationURL = rawurlencode($voiture->getImmatriculation());
	$immatriculationHTML = htmlspecialchars($voiture->getImmatriculation());
	$marqueHTML = htmlspecialchars($voiture->getMarque());
    $modelHTML = htmlspecialchars($voiture->getModel());
	
	echo '<li>
            <p>
                Voiture ' . $marqueHTML .', de model :  '.$modelHTML. ' et d\'immatriculation <a href="frontController.php?controller=voiture&action=read&immatriculation=' . $immatriculationURL . '">' . $immatriculationHTML . '</a>
            </p>
            <div>
                <a href="frontController.php?controller=voiture&action=update&&immatriculation=' . $immatriculationURL . '"><img src="../assets/svg/pen.svg" alt="pen"/></a>
                <a href="frontController.php?controller=voiture&action=delete&immatriculation=' . $immatriculationURL . '"><img src="../assets/svg/cross.svg" alt="cross"/></a>
            </div>
        </li>
	';
}