<?php

namespace App\Covoiturage\Controller;

abstract class AbstractController
{
    protected function afficheVue(string $cheminVue, array $parametres = []): void
    {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue
    }
}