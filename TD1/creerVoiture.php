<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title> Mon premier php </title>
</head>

<body>

<p> Ma nouvelle voiture:</p>
<p>Immatriculation: <?php echo $_POST['immatriculation']; ?></p>
<p>Marque: <?php echo $_POST['marque']; ?></p>
<p>Couleur: <?php echo $_POST['couleur']; ?></p>
<p>nbSieges: <?php echo $_POST['nbSieges']?></p>

</body>
</html>
