<form method="GET" action='frontController.php'>
    <legend>Ajoutez un trajet</legend>
    <input type='hidden' name='action' value='created'>
    <input type='hidden' name='controller' value='trajet'>
    <li>
        <input type="text" placeholder="Entrez le lieu de départ" name="depart" required/>
        <label>Lieu de départ</label>
    </li>
    <li>
        <input type="text" placeholder="Entrez le lieu d'arrivée" name="arrivee" required/>
        <label>Lieu d'arrivée</label>
    </li>
    <li>
        <input type="date" placeholder="Entrez la date du trajet" name="date" required/>
        <label>Date du trajet</label>
    </li>
    <li>
        <input type="number" placeholder="Entrez le nombre de place" name="nbPlaces" required/>
        <label>Nombre de places</label>
    </li>
    <li>
        <input type="number" placeholder="Entrez le prix du trajet" name="prix" required/>
        <label>Prix du trajet</label>
    </li>
    <li>
        <input type="text" placeholder="Entrez le login du conducteur" name="conducteurLogin" required/>
        <label>Login du conducteur</label>
    </li>
    <li>
        <input type="submit" value="Envoyer"/>
    </li>
</form>