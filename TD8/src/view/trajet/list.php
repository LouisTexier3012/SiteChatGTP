<?php

/* @var \App\Covoiturage\Model\DataObject\Trajet[] $trajets*/

echo '

<li>
		<a href="frontController.php?controller=trajet&action=create">Ajouter un nouveau trajet</a>
		<a href="frontController.php?controller=trajet&action=create"><img src="../assets/svg/add.svg" alt="add"/></a>
</li>
';

foreach ($trajets as $trajet)
{
	echo '
		<li>
				<div>
						Trajet <a href="frontController.php?controller=trajet&action=read&id='.$trajet->getId().'">'.htmlspecialchars($trajet->getDepart() . " à " . $trajet->getArrivee()).'</a>
				</div>
				<div>
				    <a href="frontController.php?controller=trajet&action=update&id=' . $trajet->getId() . '"><img src="../assets/svg/pen.svg" alt="pen"/></a>
				    <a href="frontController.php?controller=trajet&action=delete&id=' . $trajet->getId() . '"><img src="../assets/svg/cross.svg" alt="cross"/></a>
				</div>
		</li>
	';
}