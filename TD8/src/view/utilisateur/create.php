

<form method="POST" action='frontController.php?controller=utilisateur&action=created'>
    <legend>Créer un compte</legend>
    <input type="hidden" name="token" value="<?= $_POST["token"]?>"/>
    <li>
        <input type="text" name="login" value="<?=$_POST["login"] ?? ""?>" max="16" placeholder="Entrez votre nom d'utilisateur"/>
        <label>Nom d'utilisateur</label>
    </li>
    <li>
        <input type="email" name="email" value="<?=$_POST["email"] ?? ""?>" max="320" placeholder="Entrez votre email"/>
        <label>Email</label>
    </li>
    <li>
        <input type="text" name="prenom" value="<?=$_POST["prenom"] ?? ""?>" max="16" placeholder="Entrez votre prénom"/>
        <label>Prénom</label>
    </li>
    <li>
        <input type="text" name="nom" value="<?=$_POST["nom"] ?? ""?>" max="16" placeholder="Entrez votre nom"/>
        <label>Nom</label>
    </li>
    <li>
        <input type="password" name="password" placeholder="Entrez votre mot de passe" max="128">
        <label>Mot de passe</label>
    </li>
    <li>
        <input type="password" name="confirm" placeholder="Confirmez votre mot de passe" max="128">
        <label>Confirmation du mot de passe</label>
    </li>
    <li>
        <input type="submit" value="Envoyer"/>
    </li>
</form>