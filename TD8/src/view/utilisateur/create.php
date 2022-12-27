

<form method="POST" action='frontController.php?controller=utilisateur&action=created'>
    <legend>Créer un compte</legend>
    <li>
        <input type="text" name="login" value="<?=$_POST["login"] ?? ""?>" placeholder="Entrez votre nom d'utilisateur"/>
        <label>Nom d'utilisateur</label>
    </li>
    <li>
        <input type="text" name="prenom" value="<?=$_POST["prenom"] ?? ""?>" placeholder="Entrez votre prénom"/>
        <label>Prénom</label>
    </li>
    <li>
        <input type="text" name="nom" value="<?=$_POST["nom"] ?? ""?>" placeholder="Entrez votre nom"/>
        <label>Nom</label>
    </li>
    <li>
        <input type="password" name="password" placeholder="Entrez votre mot de passe" pattern=".{3,}">
        <label>Mot de passe</label>
    </li>
    <li>
        <input type="password" name="password2" placeholder="Confirmez votre mot de passe" pattern=".{3,}">
        <label>Confirmation du mot de passe</label>
    </li>
    <li>
        <input type="submit" value="Envoyer"/>
    </li>
</form>