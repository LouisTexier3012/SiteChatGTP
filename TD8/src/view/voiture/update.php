<?php /* @var App\Covoiturage\Model\DataObject\Voiture $voiture*/?>

<form method="POST" action='frontController.php?controller=voiture&action=updated'>
    <legend>Modifiez votre voiture</legend>
    <li>
        <input type="text" name="immatriculation" value="<?=htmlspecialchars($voiture->getImmatriculation())?>" pattern=".{6}" placeholder="Entrez l'immatriculation de votre voiture" readonly/>
        <label>Immatriculation</label>
    </li>
    <li>
        <input type="text" name="marque" value="<?=$_POST["marque"] ?? htmlspecialchars($voiture->getMarque())?>" pattern=".+" placeholder="Entrez la marque de votre voiture"/>
        <label>Marque</label>
    </li>
    <li>
        <input type="text" name="model" value="<?=$_POST["model"] ?? htmlspecialchars($voiture->getModel())?>" pattern=".+" placeholder="Entrez le model de votre voiture"/>
        <label>Model</label>
    </li>
    <li>
        <input type="color" name="couleur" value="<?=$_POST["couleur"] ?? htmlspecialchars($voiture->getCouleur())?>" pattern=".+" placeholder="Entrez la couleur de votre voiture"/>
        <label>Couleur</label>
    </li>
    <li>
        <input type="number" name="nbSieges" value="<?=$_POST["nbSieges"] ?? htmlspecialchars($voiture->getNbSieges())?>" min="1" max="50" placeholder="Entrez le nombre de siège de votre voiture"/>
        <label>Nombre de sièges</label>
    </li>
    <li>
        <input type="submit" value="Envoyer"/>
    </li>
</form>