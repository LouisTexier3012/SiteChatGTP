<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des voitures</title>
</head>
<body>
<?php

foreach ($voitures as $voiture) {
    $immatriculationURL = rawurlencode($voiture->getImmatriculation());
    $immatriculationHTML = htmlspecialchars($voiture->getImmatriculation());

    echo '<p> Voiture d\'immatriculation <a href=frontController.php?action=read&immatriculation='
        . $immatriculationURL
        . '>'
        . $immatriculationHTML .'</a>.</p>';
}
?>
</body>
</html>