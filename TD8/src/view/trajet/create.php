

<form method="POST" action='frontController.php?controller=trajet&action=created'>
    <legend>Ajoutez un trajet</legend>
    
    <li>
        <input type="text" name="depart" value="<?=$_POST["depart"] ?? ""?>" pattern=".+" placeholder="Entrez le lieu de départ"/>
        <label>Lieu de départ</label>
    </li>
    <li>
        <input type="text" name="arrivee" value="<?=$_POST["arrivee"] ?? ""?>" pattern=".+" placeholder="Entrez le lieu d'arrivée"/>
        <label>Lieu d'arrivée</label>
    </li>
    <li>
        <input type="date" name="date" value="<?=$_POST["date"] ?? ""?>" min="<?=date("Y-m-d")?>" placeholder="Entrez la date du trajet"/>
        <label>Date du trajet</label>
    </li>
    <li>
        <input type="number" name="nbPlaces" value="<?=$_POST["nbPlaces"] ?? ""?>" min="1" max="50" placeholder="Entrez le nombre de place"/>
        <label>Nombre de places</label>
    </li>
    <li>
        <input type="number" name="prix" value="<?=$_POST["prix"] ?? ""?>" min="1" max="1000" placeholder="Entrez le prix du trajet"/>
        <label>Prix du trajet</label>
    </li>
    <li>
        <input type="text" name="conducteurLogin" value="<?=$_POST["conducteurLogin"] ?? ""?>" placeholder="Entrez le nom d'utilisateur du conducteur"/>
        <label>Nom d'utilisateur du conducteur</label>
    </li>
    <li>
        <input type="submit" value="Envoyer"/>
    </li>
</form>