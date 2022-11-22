<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\DataObject\Utilisateur;
use App\Covoiturage\Model\Repository\UtilisateurRepository;

class ControllerUtilisateur extends AbstractController
{

    public static function error(string $errorMessage): void
    {
        self::afficheVue('../view/view.php', ["pagetitle" => "Page d'erreur",
                                                        "cheminVueBody" => "utilisateur/error.php",
                                                        "errorMessage" => $errorMessage]);
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

    protected function getRepository(): UtilisateurRepository
    {
        return new UtilisateurRepository();
    }
}