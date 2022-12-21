<?php

use App\Covoiturage\Lib\PreferenceController;

?>

<form method="GET" action='frontController.php'>
    <legend>Créer un nouvel utilisateur</legend>
    <input type="hidden" name="action" value="enregistrerPreference">
    <li>
        <input type="radio" name="controller" value="voiture"<?php if (PreferenceController::lire() == "Voiture") echo " checked"?>>
        <label>Voiture</label>
    </li>
    <li>
        <input type="radio" name="controller" value="utilisateur"<?php if (PreferenceController::lire() == "Utilisateur") echo " checked"?>>
        <label>Utilisateur</label>
    </li>
    <li>
        <input type="radio" name="controller" value="trajet"<?php if (PreferenceController::lire() == "Trajet") echo " checked"?>>
        <label>Trajet</label>
    </li>
    <li>
        <input type="submit" value="Envoyer"/>
    </li>
</form>