<?php

namespace App\Covoiturage\Model\Repository;

use App\Covoiturage\Model\DataObject\AbstractDataObject;
use App\Covoiturage\Model\DataObject\Trajet;

class TrajetRepository extends AbstractRepository
{
    public function getNomTable(): string
    {
        return 'trajet';
    }

    protected function getNomClePrimaire(): string
    {
        return 'id';
    }

    protected function getNomsColonnes(): array
    {
        return ['id', 'depart', 'arrivee', 'date', 'nbPlaces', 'prix', 'conducteurLogin'];
    }

    protected function construire(array $utilisateurFormatTableau): AbstractDataObject
    {
        $id = $utilisateurFormatTableau['id'];
        $depart = $utilisateurFormatTableau['depart'];
        $arrivee = $utilisateurFormatTableau['arrivee'];
        $date = $utilisateurFormatTableau['date'];
        $nbPlaces = $utilisateurFormatTableau['nbPlaces'];
        $prix = $utilisateurFormatTableau['prix'];
        $conducteurLogin = $utilisateurFormatTableau['conducteurLogin'];

        return new Trajet($id, $depart, $arrivee, $date, $nbPlaces, $prix, $conducteurLogin);
    }
}