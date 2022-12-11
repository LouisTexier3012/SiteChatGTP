<body>
    <form method="GET" action='frontController.php'>
        <fieldset>
            <legend>Créer un nouveau trajet:</legend>
            <p>
                <label for="id">Id</label> :
                <input type="text" placeholder="" name="id" id="id" required/>

                <label for="depart">Départ</label> :
                <input type="text" placeholder="Lieu de départ" name="depart" id="depart" required/>

                <label for="arrivee">Arrivée</label> :
                <input type="text" placeholder="Lieu d'arrivée" name="arrivee" id="arrivee" required/>

                <label for="date">Date</label> :
                <input type="date" placeholder="Date du trajet" name="date" id="date" required/>

                <label for="nbPlaces">nbPlaces</label> :
                <input type="number" placeholder="" name="nbPlaces" id="nbPlaces" required/>

                <label for="prix">Prix</label> :
                <input type="number" placeholder="" name="prix" id="prix" required/>

                <label for="conducteurLogin">conducteurLogin</label> :
                <input type="text" placeholder="login" name="conducteurLogin" id="conducteurLogin" required/>

                <input type='hidden' name='action' value='created'>
                <input type='hidden' name='controller' value='trajet'>
            </p>
            <p>
                <input type="submit" value="Envoyer"/>
            </p>
        </fieldset>
    </form>
</body>