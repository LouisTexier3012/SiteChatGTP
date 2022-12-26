<?php /* @var App\Covoiturage\Model\DataObject\Voiture $voiture*/?>

<form method="POST" action='frontController.php?controller=voiture&action=updated'>
    <legend>Modifiez votre voiture</legend>
    <li>
        <input type="text" name="immatriculation" value="<?=htmlspecialchars($voiture->getImmatriculation())?>" placeholder="###AA##" readonly/>
        <label>Immatriculation</label>
    </li>
    <li>
        <input type="text" name="marque" value="<?=$_POST["marque"] ?? htmlspecialchars($voiture->getMarque())?>" placeholder="Entrez la marque de votre voiture" required/>
        <label>Marque</label>
    </li>
    <li>
        <input type="text" name="couleur" value="<?=$_POST["couleur"] ?? htmlspecialchars($voiture->getCouleur())?>" placeholder="Entrez la couleur de votre voiture" required/>
        <label>Couleur</label>
    </li>
    <li>
        <input type="number" name="nbSieges" value="<?=$_POST["nbSieges"] ?? htmlspecialchars($voiture->getNbSieges())?>" placeholder="Entrez le nombre de siège de votre voiture" required/>
        <label>Nombre de sièges</label>
    </li>
    <li>
        <input type="submit" value="Envoyer"/>
    </li>
</form>