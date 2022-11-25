<?php
use App\Covoiturage\Model\DataObject\Trajet;

/* @var Trajet $trajet*/;
?>

<body>
<form method="GET" action='frontController.php'>
    <fieldset>
        <legend>Modifier un trajet:</legend>
        <p>
            <label for="id">Id</label> :
            <input type="text" placeholder="" name="id" id="id" value="<?= htmlspecialchars($trajet->getId())?>" readonly/>

            <label for="depart">Départ</label> :
            <input type="text" placeholder="Lieu de départ" name="depart" id="depart" value="<?= htmlspecialchars($trajet->getDepart())?>" required/>

            <label for="arrivee">Arrivée</label> :
            <input type="text" placeholder="Lieu d'arrivée" name="arrivee" id="arrivee" value="<?= htmlspecialchars($trajet->getArrivee())?>" required/>

            <label for="date">Date</label> :
            <input type="date" placeholder="Date du trajet" name="date" id="date" value="<?= htmlspecialchars($trajet->getDate())?>" required/>

            <label for="nbPlaces">nbPlaces</label> :
            <input type="number" placeholder="" name="nbPlaces" id="nbPlaces" value="<?= htmlspecialchars($trajet->getNbPlaces())?>" required/>

            <label for="prix">Prix</label> :
            <input type="number" placeholder="" name="prix" id="prix" value="<?= htmlspecialchars($trajet->getPrix())?>" required/>

            <label for="conducteurLogin">conducteurLogin</label> :
            <input type="text" placeholder="login" name="conducteurLogin" id="conducteurLogin" value="<?= htmlspecialchars($trajet->getConducteurLogin())?>" required/>

            <input type='hidden' name='action' value='updated'>
            <input type='hidden' name='controller' value='trajet'>
        </p>
        <p>
            <input type="submit" value="Envoyer"/>
        </p>
    </fieldset>
</form>
</body>