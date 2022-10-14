<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des voitures</title>
</head>
<body>
<?php

foreach ($voitures as $voiture) {
    echo '<p> Voiture d\'immatriculation <a href=frontController.php?action=read&immatriculation=' . $voiture->getImmatriculation() . '>' . $voiture->getImmatriculation() .'</a>.</p>';
}
?>
</body>
</html>