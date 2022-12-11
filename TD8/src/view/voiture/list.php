<?php

/* @var Utilisateur[] $voitures*/
foreach ($voitures as $voiture) {
    $immatriculationURL = rawurlencode($voiture->getImmatriculation());
    $immatriculationHTML = htmlspecialchars($voiture->getImmatriculation());
    $marqueHTML = htmlspecialchars($voiture->getMarque());

    echo '<div class="list">
            <p>
                Voiture ' . $marqueHTML . ' d\'immatriculation <a href="frontController.php?controller=voiture&action=read&immatriculation=' . $immatriculationURL . '">' . $immatriculationHTML .'</a>
            </p>
            <div>
                <a href="frontController.php?controller=voiture&action=update&&immatriculation=' . $immatriculationURL . '"><img src="../assets/svg/pen.svg" alt="pen"/></a>
                <a href="frontController.php?controller=voiture&action=delete&immatriculation=' . $immatriculationURL . '"><img src="../assets/svg/cross.svg" alt="cross"/></a>
            </div>
        </div>';
}
echo   '<div class="list">
            <a href="frontController.php?controller=voiture&action=create"><img src="../assets/svg/add.svg" alt="add"/></a>
        </div>';