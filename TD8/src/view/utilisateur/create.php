<form method="GET" action='frontController.php'>
    <legend>Créer un compte</legend>
    <input type='hidden' name='action' value='created'>
    <input type='hidden' name='controller' value='utilisateur'>
    <li>
        <input type="text" placeholder="" name="login" id="login" required/>
        <label>Login</label>
    </li>
    <li>
        <input type="text" placeholder="" name="prenom" id="prenom" required/>
        <label>Prénom</label>
    </li>
    <li>
        <input type="text" placeholder="" name="nom" id="nom" required/>
        <label>Nom</label>
    </li>
    <li>
        <input class="InputAddOn-field" type="password" value="" placeholder="" name="password" id="password" required>
        <label>Mot de passe</label>
    </li>
    <li>
        <input class="InputAddOn-field" type="password" value="" placeholder="" name="password2" id="password2" required>
        <label>Confirmez votre du mot de passe</label>
    </li>
    <li>
        <input type="submit" value="Envoyer"/>
    </li>
</form>