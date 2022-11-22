<?php
namespace App\Covoiturage\Controller;
use App\Covoiturage\Model\DataObject\Voiture;
use App\Covoiturage\Model\Repository\AbstractRepository;
use App\Covoiturage\Model\Repository\VoitureRepository;

class ControllerVoiture extends AbstractController
{
    public static function created() : void {

        $voiture = new Voiture($_GET['marque'],
                               $_GET['couleur'],
                               $_GET['immatriculation'],
                               $_GET['nbSieges']);
        VoitureRepository::sauvegarder($voiture);
        self::afficheVue('../view/view.php', ["pagetitle" => "Voiture créée",
                                                                "cheminVueBody" => "voiture/created.php",
                                                                "voiture" => $voiture]);
    }

    public static function error(String $errorMessage) : void {

        self::afficheVue('../view/view.php', ["pagetitle" => "Page d'erreur",
                                                        "cheminVueBody" => "voiture/error.php",
                                                        "errorMessage" => $errorMessage]);
    }

    public static function update() : void {

        self::afficheVue('../view/view.php', ["pagetitle" => "Modification de voiture",
                                                        "cheminVueBody" => "voiture/update.php",
                                                        "voiture" => (new VoitureRepository())->select($_GET['immatriculation'])]);
    }

    public static function updated() : void {

        (new VoitureRepository())->update(new Voiture($_GET['marque'],
                                                      $_GET['couleur'],
                                                      $_GET['immatriculation'],
                                                      $_GET['nbSieges']));

        self::afficheVue('../view/view.php', ["pagetitle" => "Voiture modifiée",
                                                        "cheminVueBody" => "voiture/updated.php",
                                                        "immatriculation" => $_GET['immatriculation']]);
    }

    protected function getRepository(): AbstractRepository
    {
        return new VoitureRepository();
    }
}