<?php /* @var App\Covoiturage\Model\DataObject\Voiture $voiture*/?>

<form method="GET" action='frontController.php'>
    <legend>Modifiez votre voiture</legend>
    <input type='hidden' name='action' value='updated'>
    <input type='hidden' name='controller' value='voiture'>
    <li>
        <input type="text" placeholder="123AB45" name="immatriculation" value="<?=htmlspecialchars($voiture->getImmatriculation())?>" readonly/>
        <label>Immatriculation</label>
    </li>
    <li>
        <input type="text" placeholder="Entrez la marque de votre voiture" name="marque" value="<?=htmlspecialchars($voiture->getMarque())?>" required/>
        <label>Marque</label>
    </li>
    <li>
        <input type="text" placeholder="Entrez la couleur de votre voiture" name="couleur" value="<?=htmlspecialchars($voiture->getCouleur())?>" required/>
        <label>Couleur</label>
    </li>
    <li>
        <input type="number" placeholder="Entrez le nombre de siège de votre voiture" name="nbSieges" value="<?=htmlspecialchars($voiture->getNbSieges())?>" required/>
        <label>Nombre de sièges</label>
    </li>
    <li>
        <input type="submit" value="Envoyer"/>
    </li>
</form>