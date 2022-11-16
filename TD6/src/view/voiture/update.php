<?php
use App\Covoiturage\Model\DataObject\Voiture;

/* @var Voiture $voiture*/;
?>

<body>
<form method="GET" action='frontController.php'>
    <fieldset>
        <legend>Mon formulaire :</legend>
        <p>
            <label for="immat_id">Immatriculation</label> :
            <input type="text" placeholder="123AB45" name="immatriculation" id="immat_id" value="<?= htmlspecialchars($voiture->getImmatriculation())?>" readonly/>

            <label for="brand">Marque</label> :
            <input type="text" placeholder="Volkswagen" name="marque" id="brand" value="<?= htmlspecialchars($voiture->getMarque())?>" required/>

            <label for="color">Couleur</label> :
            <input type="text" placeholder="rouge" name="couleur" id="color" value="<?= htmlspecialchars($voiture->getCouleur())?>" required/>

            <label for="seats">nbSieges</label> :
            <input type="number" placeholder="0-8" name="nbSieges" id="seats" value="<?= htmlspecialchars($voiture->getNbSieges())?>" required/>

            <input type='hidden' name='action' value='updated'>
        </p>
        <p>
            <input type="submit" value="Envoyer"/>
        </p>
    </fieldset>
</form>
</body>