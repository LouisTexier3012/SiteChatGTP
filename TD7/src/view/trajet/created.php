<?php /* @var \App\Covoiturage\Model\DataObject\Trajet $trajet*/?>

<body>
    <p>Le trajet N°<?=$trajet->getId()?>, <?= htmlspecialchars($trajet->getDepart())?>-<?= htmlspecialchars($trajet->getArrivee())?> a bien été créé !</p>
</body>