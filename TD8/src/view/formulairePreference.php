<?php

use App\Covoiturage\Lib\PreferenceController;

?>

<form method="POST" action='frontController.php?action=enregistrerPreference'>
    <legend>Créer un nouvel utilisateur</legend>
    <li>
        <input type="radio" name="controller" value="voiture"<?php if (PreferenceController::existe() && PreferenceController::lire() == "Voiture") echo " checked"?>>
        <label>Voiture</label>
    </li>
    <li>
        <input type="radio" name="controller" value="utilisateur"<?php if (PreferenceController::existe() && PreferenceController::lire() == "Utilisateur") echo " checked"?>>
        <label>Utilisateur</label>
    </li>
    <li>
        <input type="radio" name="controller" value="trajet"<?php if (PreferenceController::existe() && PreferenceController::lire() == "Trajet") echo " checked"?>>
        <label>Trajet</label>
    </li>
    <li>
        <input type="submit" value="Envoyer"/>
    </li>
</form>