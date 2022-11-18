<?php

/* @var ModelUtilisateur[] $utilisateurs*/
foreach ($utilisateurs as $utilisateur) {
    $loginURL = rawurlencode($utilisateur->getLogin());
    $loginHTML = htmlspecialchars($utilisateur->getLogin());
    $prenomHTML = htmlspecialchars($utilisateur->getPrenom());
	$nomHTML = htmlspecialchars($utilisateur->getNom());

    echo '<div class="list">
            <p>
                Utilisateur <a href="frontController.php?action=read&login='.$loginURL.'">'.$prenomHTML.' '.$nomHTML.'</a>
            </p>
            <div>
                <a href="frontController.php?action=update&login=' . $loginURL . '"><img src="svg/pen.svg" alt="pen"/></a>
                <a href="frontController.php?action=delete&login=' . $loginURL . '"><img src="svg/cross.svg" alt="cross"/></a>
            </div>
        </div>';
}
?>