<?php /* @var App\Covoiturage\Model\DataObject\Utilisateur $utilisateur*/?>

<form method="POST" action='frontController.php?controller=utilisateur&action=updated'>
    <legend>Modifiez votre profil</legend>
    <li>
        <input type="text" name="login" value="<?=htmlspecialchars($utilisateur->getLogin())?>" readonly/>
        <label>Nom d'utilisateur</label>
    </li>
    <li>
        <input type="email" name="email" value="<?=htmlspecialchars($_POST["email"] ?? $utilisateur->getEmail() ?? $utilisateur->getUnchecked())?>" max="320" placeholder="Entrez votre email"/>
        <label>Email</label>
    </li>
    <li>
        <input type="text" name="prenom" value="<?=$_POST["prenom"] ?? htmlspecialchars($utilisateur->getPrenom())?>" placeholder="Entrez votre prénom"/>
        <label>Prénom</label>
    </li>
    <li>
        <input type="text" name="nom" value="<?=$_POST["nom"] ?? htmlspecialchars($utilisateur->getNom())?>" placeholder="Entrez votre nom"/>
        <label>Nom</label>
    </li>
    <li>
        <input type="password" name="password" placeholder="Entrez votre mot de passe actuel" max="128">
        <label>Mot de passe actuel</label>
    </li>
    <li>
        <input type="password" name="new" placeholder="Entrez votre nouveau mot de passe" max="128">
        <label>Nouveau mot de passe</label>
    </li>
    <li>
        <input type="password" name="confirm" placeholder="Confirmez votre nouveau mot de passe" max="128">
        <label>Confirmation du nouveau mot de passe</label>
    </li>
    <li>
        <input type="submit" value="Envoyer"/>
    </li>
</form>