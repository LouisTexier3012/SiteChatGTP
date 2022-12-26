<?php /* @var App\Covoiturage\Model\DataObject\Utilisateur $utilisateur*/?>

<form method="POST" action='frontController.php?controller=utilisateur&action=updated'>
        <legend>Modifiez votre profil</legend>
        <li>
            <input type="text" name="login" value="<?=$_POST["login"] ?? htmlspecialchars($utilisateur->getLogin())?>" readonly/>
            <label>Login</label>
        </li>
        <li>
            <input type="text" name="prenom" value="<?=$_POST["prenom"] ?? htmlspecialchars($utilisateur->getPrenom())?>" required/>
            <label>Prénom</label>
        </li>
        <li>
            <input type="text" name="nom" value="<?=$_POST["nom"] ?? htmlspecialchars($utilisateur->getNom())?>" required/>
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