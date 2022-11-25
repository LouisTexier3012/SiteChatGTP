<?php

use App\Covoiturage\Model\Repository\VoitureRepository;

/* @var VoitureRepository $voiture*/
 ?>

<body>
    <p>La voiture d'immatriculation <?= htmlspecialchars($voiture->getImmatriculation())?> a bien été modifiée !</p>
</body>