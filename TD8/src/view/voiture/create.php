

<form method="POST" action='frontController.php?controller=voiture&action=created'>
    <legend>Ajoutez une nouvelle voiture</legend>
    <li>
        <input type="text" name="immatriculation" value="<?=$_POST["immatriculation"] ?? ""?>" pattern=".{7}" placeholder="Entrez l'immatriculation de la voiture"/>
        <label>Immatriculation</label>
    </li>
    <li>
        <input type="text" name="marque" value="<?=$_POST["marque"] ?? ""?>" pattern=".+" placeholder="Entrez la marque de la voiture"/>
        <label>Marque</label>
    </li>
    <li>
        <input type="text" name="Model" value="<?=$_POST["model"] ?? ""?>" pattern=".+" placeholder="Entrez le Model de la voiture"/>
        <label>Model</label>
    </li>
    <li>
        <input type="color" name="couleur" value="<?=$_POST["couleur"] ?? ""?>" pattern=".+" placeholder="Entrez la couleur de la voiture"/>
        <label>Couleur</label>
    </li>
    <li>
        <input type="number" name="nbSieges" value="<?=$_POST["nbSieges"] ?? ""?>" min="1" max="50" placeholder="Entrez le nombre de siège de la voiture"/>
        <label>Nombre de sièges</label>
    </li>
    <li>
        <input type="submit" value="Envoyer"/>
    </li>
</form>