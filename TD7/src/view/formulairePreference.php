<?php

use App\Covoiturage\Lib\PreferenceController;

?>

<body>
    <form method="GET" action='frontController.php'>
    	<fieldset>
    		<legend>Créer un nouvel utilisateur:</legend>
    		<p>
    			<label for="voiture">Voiture</label>
    			<input type="radio" id="voiture" name="controller" value="voiture"<?php if (PreferenceController::lire() == "Voiture") echo " checked"?>>
    			
    			<label for="utilisateur">Utilisateur</label>
    			<input type="radio" id="utilisateur" name="controller" value="utilisateur"<?php if (PreferenceController::lire() == "Utilisateur") echo " checked"?>>
    			
    			<label for="trajet">Trajet</label>
    			<input type="radio" id="trajet" name="controller" value="trajet"<?php if (PreferenceController::lire() == "Trajet") echo " checked"?>>
    			
    			<input type="hidden" name="action" value="enregistrerPreference">
    		</p>
    		<p>
    			<input type="submit" value="Envoyer"/>
    		</p>
    	</fieldset>
    </form>
</body>