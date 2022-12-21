<?php /* @var App\Covoiturage\Model\DataObject\Utilisateur $utilisateur*/?>

<form method="GET" action='frontController.php'>
        <legend>Modifiez votre profil</legend>
        <input type='hidden' name='action' value='updated'>
        <input type='hidden' name='controller' value='utilisateur'>
        <li>
            <input type="text" name="login" value="<?=htmlspecialchars($utilisateur->getLogin())?>" readonly/>
            <label>Login</label>
        </li>
        <li>
            <input type="text" name="prenom" value="<?=htmlspecialchars($utilisateur->getPrenom())?>" required/>
            <label>Prénom</label>
        </li>
        <li>
            <input type="text" name="nom" value="<?=htmlspecialchars($utilisateur->getNom())?>" required/>
            <label>Nom</label>
        </li>
        <li>
            <input type="password" name="password" required>
            <label>Mot de passe actuel</label>
        </li>
        <li>
            <input type="password" name="newPassword" required>
            <label>Nouveau mot de passe</label>
        </li>
        <li>
            <input type="password" name="newPassword2" required>
            <label>Confirmation du nouveau mot de passe</label>
        </li>
        <li>
            <input type="submit" value="Envoyer"/>
        </li>
</form>