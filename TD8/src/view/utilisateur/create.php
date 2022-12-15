<body>
    <form method="GET" action='frontController.php'>
        <fieldset>
            <legend>Créer un nouvel utilisateur:</legend>
            <p>
                <label for="login">Login</label> :
                <input type="text" placeholder="" name="login" id="login" required/>
            </p>
            <p>
                <label for="prenom">Prénom</label> :
                <input type="text" placeholder="" name="prenom" id="prenom" required/>
            </p>
            <p>
                <label for="nom">Nom</label> :
                <input type="text" placeholder="" name="nom" id="nom" required/>
            </p>
            <p>
                <label class="InputAddOn-item" for="password">Mot de passe&#42;</label>
                <input class="InputAddOn-field" type="password" value="" placeholder="" name="password" id="password" required>
            </p>
            <p>
                <label class="InputAddOn-item" for="password2">Vérification du mot de passe&#42;</label>
                <input class="InputAddOn-field" type="password" value="" placeholder="" name="password2" id="password2" required>
            </p>
                <input type='hidden' name='action' value='created'>
                <input type='hidden' name='controller' value='utilisateur'>
            
            <p>
                <input type="submit" value="Envoyer"/>
            </p>
        </fieldset>
    </form>
</body>