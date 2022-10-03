<?php

class Utilisateur {

    private string $login;
    private string $nom;
    private string $prenom;

    public function __construct(string $login, string $nom, string $prenom) {

        $this->login = $login;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    public static function getUtilisateurs() : array {

        $utilisateurs = [];
        $pdoStatement = Model::getPdo()->query("SELECT * FROM utilisateur");

        foreach ($pdoStatement as $utilisateur) {

            $utilisateurs[] = new Utilisateur($utilisateur['login'], $utilisateur['nom'], $utilisateur['prenom']);
        }
        return $utilisateurs;
    }
}
?>