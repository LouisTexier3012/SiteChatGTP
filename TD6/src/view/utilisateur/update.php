<?php
use App\Covoiturage\Model\DataObject\Utilisateur;

/* @var Utilisateur $utilisateur*/;
?>

<body>
<form method="GET" action='frontController.php'>
    <fieldset>
        <legend>Modifier un utilisateur:</legend>
        <p>
            <label for="login">Login</label> :
            <input type="text" placeholder="" name="login" id="login" value="<?= htmlspecialchars($utilisateur->getLogin())?>" readonly/>

            <label for="prenom">Prénom</label> :
            <input type="text" placeholder="" name="prenom" id="prenom" value="<?= htmlspecialchars($utilisateur->getPrenom())?>" required/>

            <label for="nom">Nom</label> :
            <input type="text" placeholder="" name="nom" id="nom" value="<?= htmlspecialchars($utilisateur->getNom())?>" required/>

            <input type='hidden' name='action' value='updated'>
            <input type='hidden' name='controller' value='utilisateur'>
        </p>
        <p>
            <input type="submit" value="Envoyer"/>
        </p>
    </fieldset>
</form>
</body>