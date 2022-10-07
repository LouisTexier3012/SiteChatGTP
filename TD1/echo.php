<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title> Mon premier php </title>
</head>

<body>
<p>
<?php
$voiture0 = [
'marque' => "Renault",
'couleur' => "bleu",
'immatriculation' => "256AB34",
'nbSieges' => 5
];

$voiture1 = [
    'marque' => "Nissan",
    'couleur' => "blanc",
    'immatriculation' => "AB123CD",
    'nbSieges' => 9
];

$voiture2 = [
    'marque' => "Ford",
    'couleur' => "mustang",
    'immatriculation' => "EF456GH",
    'nbSieges' => 2
];

$voitures = [];
//$voitures[] = $voiture0;
//$voitures[] = $voiture1;
//$voitures[] = $voiture2;

if (empty($voitures)) {
    echo "Il n'y a pas de voiture";
}
else {
    foreach ($voitures as $i => $car) {
        echo "<p>ModelVoiture {$voitures[$i]['immatriculation']} de marque {$voitures[$i]['marque']} (couleur {$voitures[$i]['couleur']}, {$voitures[$i]['nbSieges']} sieges)<p>";
    }
}

?>




</p>
</body>
</html>