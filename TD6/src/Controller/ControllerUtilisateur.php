<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\DataObject\Utilisateur;
use App\Covoiturage\Model\Repository\UtilisateurRepository;

class ControllerUtilisateur
{
    private static function afficheVue(string $cheminVue, array $parametres = []): void
    {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue
    }

    public static function readAll(): void
    {
        $utilisateurs = (new UtilisateurRepository)->selectAll();    //appel au modèle pour gerer la BD
        self::afficheVue('../view/view.php', ["pagetitle" => "Liste des utilisateurs",
                                                        "cheminVueBody" => "utilisateur/list.php",
                                                        "utilisateurs" => $utilisateurs]);
    }

    public static function read(): void
    {
        $utilisateur = (new UtilisateurRepository)->select($_GET['login']);

        if (!is_null($utilisateur)) self::afficheVue('../view/view.php', ["pagetitle" => "Détail de l'utilisateur {$utilisateur->getLogin()}",
                                                                                    "cheminVueBody" => "utilisateur/detail.php",
                                                                                    "utilisateur" => $utilisateur]);
    }

    public static function error(string $errorMessage): void
    {
        self::afficheVue('../view/view.php', ["pagetitle" => "Page d'erreur",
                                                        "cheminVueBody" => "utilisateur/error.php",
                                                        "errorMessage" => $errorMessage]);
    }

    public static function create(): void
    {
        self::afficheVue('../view/view.php', ["pagetitle" => "Créer un utilisateur",
                                                        "cheminVueBody" => "utilisateur/create.php"]);
    }

    public static function created(): void
    {
        $utilisateur = new Utilisateur($_GET['login'],
            $_GET['prenom'],
            $_GET['nom']);
        (new UtilisateurRepository)->create($utilisateur);
        self::afficheVue('../view/view.php', ["pagetitle" => "Utilisateur créée",
                                                        "cheminVueBody" => "utilisateur/created.php",
                                                        "utilisateur" => $utilisateur]);
    }

    public static function update(): void
    {
        self::afficheVue('../view/view.php', ["pagetitle" => "Modification d'utilisateur",
                                                        "cheminVueBody" => "utilisateur/update.php",
                                                        "utilisateur" => (new UtilisateurRepository)->select($_GET['login'])]);
    }

    public static function updated(): void
    {
        $utilisateur = new Utilisateur($_GET['login'],
                                       $_GET['prenom'],
                                       $_GET['nom']);
        (new UtilisateurRepository)->update($utilisateur);
        self::afficheVue('../view/view.php', ["pagetitle" => "Utilisateur modifié",
                                                        "cheminVueBody" => "utilisateur/updated.php",
                                                        "utilisateur" => $utilisateur]);
    }

    public static function delete(): void
    {
        (new UtilisateurRepository())->delete($_GET['login']);

        self::afficheVue('../view/view.php', ["pagetitle" => "Utilisateur supprimé",
                                                        "cheminVueBody" => "utilisateur/deleted.php",
                                                        "login" => $_GET['login']]);
    }
}