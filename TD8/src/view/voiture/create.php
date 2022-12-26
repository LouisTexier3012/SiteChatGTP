<form method="POST" action='frontController.php?controller=voiture&action=created'>
    <legend>Ajoutez une nouvelle voiture</legend>
    <li>
        <input type="text" name="immatriculation" value="<?=$_POST["immatriculation"] ?? ""?>" placeholder="Entrez l'immatriculation de la voiture" required/>
        <label>Immatriculation</label>
    </li>
    <li>
        <input type="text" name="marque" value="<?=$_POST["marque"] ?? ""?>" placeholder="Entrez la marque de la voiture" required/>
        <label>Marque</label>
    </li>
    <li>
        <input type="text" name="couleur" value="<?=$_POST["couleur"] ?? ""?>" placeholder="Entrez la couleur de la voiture" required/>
        <label>Couleur</label>
    </li>
    <li>
        <input type="number" name="nbSieges" value="<?=$_POST["nbSieges"] ?? ""?>" placeholder="Entrez le nombre de siège de la voiture" required/>
        <label>Nombre de sièges</label>
    </li>
    <li>
        <input type="submit" value="Envoyer"/>
    </li>
</form>