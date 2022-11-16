<?php

/* @var ModelVoiture[] $voitures*/
foreach ($voitures as $voiture) {
    $immatriculationURL = rawurlencode($voiture->getImmatriculation());
    $immatriculationHTML = htmlspecialchars($voiture->getImmatriculation());
    $marqueHTML = htmlspecialchars($voiture->getMarque());

    echo '<div class="list">
            <p>
                Voiture ' . $marqueHTML . ' d\'immatriculation <a href="frontController.php?action=read&immatriculation=' . $immatriculationURL . '">' . $immatriculationHTML .'</a>
            </p>
            <div>
                <a href="frontController.php?action=update&immatriculation=' . $immatriculationURL . '"><img src="svg/pen.svg" alt="pen"/></a>
                <a href="frontController.php?action=delete&immatriculation=' . $immatriculationURL . '"><img src="svg/cross.svg" alt="cross"/></a>
            </div>
        </div>';
}
?>