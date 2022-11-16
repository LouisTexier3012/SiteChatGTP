<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Insérer le titrer ici </title>
</head>
<body>
<?php
require_once "Voiture.php";

$voiture1 = new ModelVoiture("Tesla", "blanc", "1234567890", 4);
$voiture1->afficher();
?>

</body>
</html>