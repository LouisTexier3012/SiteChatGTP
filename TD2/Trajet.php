<?php
class Trajet {

    private int $id;
    private string $depart;
    private string $arrivee;
    private string $date;
    private int $nbPlaces;
    private int $prix;
    private string $conducteurLogin;

    public function __construct(int $id, string $depart, string $arrivee, string $date, int $nbPlaces, int $prix, string $conducteurLogin) {
        $this->id = $id;
        $this->depart = $depart;
        $this->arrivee = $arrivee;
        $this->date = $date;
        $this->nbPlaces = $nbPlaces;
        $this->prix = $prix;
        $this->conducteurLogin = $conducteurLogin;
    }

    public static function getTrajets() : array {

        $trajets = [];
        $pdoStatement = Model::getPdo()->query("SELECT * FROM trajet");

        foreach ($pdoStatement as $trajet) {

            $trajets[] = new Trajet($trajet['id'], $trajet['depart'], $trajet['arrivee'], $trajet['date'], $trajet['nbPlaces'], $trajet['prix'], $trajet['conducteurLogin']);
        }
        return $trajets;
    }
}
?>