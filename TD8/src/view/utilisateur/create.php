<body>
    <form method="GET" action='frontController.php'>
        <fieldset>
            <legend>Créer un nouvel utilisateur:</legend>
            <p>
                <label for="login">Login</label> :
                <input type="text" placeholder="" name="login" id="login" required/>

                <label for="prenom">Prénom</label> :
                <input type="text" placeholder="" name="prenom" id="prenom" required/>

                <label for="nom">Nom</label> :
                <input type="text" placeholder="" name="nom" id="nom" required/>

                <input type='hidden' name='action' value='created'>
                <input type='hidden' name='controller' value='utilisateur'>
            </p>
            <p>
                <input type="submit" value="Envoyer"/>
            </p>
        </fieldset>
    </form>
</body>