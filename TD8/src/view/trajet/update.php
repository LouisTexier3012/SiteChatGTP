<?php
use App\Covoiturage\Model\DataObject\Trajet;

/* @var Trajet $trajet*/;
?>

<form method="GET" action='frontController.php'>
    <legend>Modifier un trajet</legend>
    <input type='hidden' name='action' value='updated'>
    <input type='hidden' name='controller' value='trajet'>
    <input type='hidden' name='id' value='<?=htmlspecialchars($trajet->getId())?>'>
    <li>
        <input type="text" placeholder="Entrez le lieu de départ" name="depart" id="depart" value="<?=htmlspecialchars($trajet->getDepart())?>" required/>
        <label>Lieu de départ</label>
    </li>
    <li>
        <input type="text" placeholder="Entrez le lieu d'arrivée" name="arrivee" id="arrivee" value="<?=htmlspecialchars($trajet->getArrivee())?>" required/>
        <label>Lieu d'arrivée</label>
    </li>
    <li>
        <input type="date" placeholder="Entrez la date du trajet" name="date" id="date" value="<?=htmlspecialchars($trajet->getDate())?>" required/>
        <label>Date du trajet</label>
    </li>
    <li>
        <input type="number" placeholder="Entrez le nombre de place" name="nbPlaces" id="nbPlaces" value="<?=htmlspecialchars($trajet->getNbPlaces())?>" required/>
        <label>Nombre de places</label>
    </li>
    <li>
        <input type="number" placeholder="Entrez le prix du trajet" name="prix" id="prix" value="<?=htmlspecialchars($trajet->getPrix())?>" required/>
        <label>Prix du trajet</label>
    </li>
    <li>
        <input type="text" placeholder="Entrez le login du conducteur" name="conducteurLogin" id="conducteurLogin" value="<?=htmlspecialchars($trajet->getConducteurLogin())?>" required/>
        <label>Login du conducteur</label>
    </li>
    <li>
        <input type="submit" value="Envoyer"/>
    </li>
</form>