<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>formGetPassagers.php</title>
</head>

<body>
    <form method="get" action="testGetPassagers.php">
        <fieldset>
        <legend>getPassagers</legend>
            <p>
                <label for="trajetId">Identifiant du trajet :</label>
                <input type="number" placeholder="1" name="trajetId" id="trajetId" required>
            </p>
            <p>
                <input type="submit" value="OK">
            </p>
        </fieldset>
    </form>
</body>