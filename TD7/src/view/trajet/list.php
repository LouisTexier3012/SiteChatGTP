<?php

/* @var \App\Covoiturage\Model\DataObject\Trajet[] $trajets*/
foreach ($trajets as $trajet) {
    $idURL = rawurlencode($trajet->getId());
    $idHTML = htmlspecialchars($trajet->getId());
    $departHTML = htmlspecialchars($trajet->getDepart());
	$arriveeHTML = htmlspecialchars($trajet->getArrivee());

    echo '<div class="list">
            <p>
                Trajet <a href="frontController.php?controller=trajet&action=read&id='.$idURL.'">'.$departHTML.'-'.$arriveeHTML.'</a>
            </p>
            <div>
                <a href="frontController.php?controller=trajet&action=update&id=' . $idURL . '"><img src="../assets/svg/pen.svg" alt="pen"/></a>
                <a href="frontController.php?controller=trajet&action=delete&id=' . $idURL . '"><img src="../assets/svg/cross.svg" alt="cross"/></a>
            </div>
        </div>';
}
echo   '<div class="list">
            <a href="frontController.php?controller=trajet&action=create"><img src="../assets/svg/add.svg" alt="add"/></a>
        </div>';