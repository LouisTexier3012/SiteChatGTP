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
        </p>
        <p>
            <label for="prenom">Prénom</label> :
            <input type="text" placeholder="" name="prenom" id="prenom" value="<?= htmlspecialchars($utilisateur->getPrenom())?>" required/>
        </p>
        <p>
            <label for="nom">Nom</label> :
            <input type="text" placeholder="" name="nom" id="nom" value="<?= htmlspecialchars($utilisateur->getNom())?>" required/>
        </p>
        <p>
            <label for="password">Mot de passe actuel</label>
            <input type="password" placeholder="" name="actualPassword" id="actualPassword" value="" required>
        </p>
        <p>
            <label for="password">Nouveau mot de passe&#42;</label>
            <input type="password" placeholder="" name="password" id="password" value="" required>
        </p>
        <p>
            <label for="password">Vérification du nouveau mot de passe&#42;</label>
            <input type="password" placeholder="" name="password2" id="password2" value="" required>
        </p>
            <input type='hidden' name='action' value='updated'>
            <input type='hidden' name='controller' value='utilisateur'>
        
        <p>
            <input type="submit" value="Envoyer"/>
        </p>
    </fieldset>
</form>
</body>