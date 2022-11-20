<?php

namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\Utilisateur;

class UtilisateurRepository extends AbstractRepository
{
    protected function getNomTable(): string
    {
        return 'utilisateur';
    }

    protected function getNomClePrimaire(): string
    {
        return 'login';
    }

    protected function construire(array $utilisateurFormatTableau): Utilisateur
    {
        $login = $utilisateurFormatTableau['login'];
        $nom = $utilisateurFormatTableau['nom'];
        $prenom = $utilisateurFormatTableau['prenom'];

        return new Utilisateur($login, $nom, $prenom);
    }

    protected function getNomsColonnes(): array
    {
        return ['login', 'prenom', 'nom'];
    }
}