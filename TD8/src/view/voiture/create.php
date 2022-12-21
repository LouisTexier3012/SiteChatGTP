<form method="GET" action='frontController.php'>
    <legend>Ajoutez une nouvelle voiture</legend>
    <input type='hidden' name='action' value='updated'>
    <input type='hidden' name='controller' value='voiture'>
    <li>
        <input type="text" placeholder="Entrez l'immatriculation de la voiture" name="immatriculation" required/>
        <label>Immatriculation</label>
    </li>
    <li>
        <input type="text" placeholder="Entrez la marque de la voiture" name="marque" required/>
        <label>Marque</label>
    </li>
    <li>
        <input type="text" placeholder="Entrez la couleur de la voiture" name="couleur" required/>
        <label>Couleur</label>
    </li>
    <li>
        <input type="number" placeholder="Entrez le nombre de siège de la voiture" name="nbSieges" required/>
        <label>Nombre de sièges</label>
    </li>
    <li>
        <input type="submit" value="Envoyer"/>
    </li>
</form>