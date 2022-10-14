<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title> Mon premier php </title>
</head>

<body>

<form method="GET" action="../frontController.php">
    <fieldset>
        <legend>Mon formulaire :</legend>
        <p>
            <label for="immat_id">Immatriculation</label> :
            <input type="text" placeholder="123AB45" name="immatriculation" id="immat_id" required/>

            <label for="brand">Marque</label> :
            <input type="text" placeholder="Volkswagen" name="marque" id="brand" required/>

            <label for="color">Couleur</label> :
            <input type="text" placeholder="rouge" name="couleur" id="color" required/>

            <label for="seats">nbSieges</label> :
            <input type="number" placeholder="0-8" name="nbSieges" id="seats" required/>

            <input type='hidden' name='action' value='created'>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>


</body>
</html>