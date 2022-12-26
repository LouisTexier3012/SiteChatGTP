<?php
/* @var String $pagetitle
 * @var String $cheminVueBody
 * @var FlashMessage $message
 */

use App\Covoiturage\Lib\FlashMessage;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$pagetitle?></title>
        <link rel="stylesheet" href="../assets/css/styles.css">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="frontController.php?controller=voiture&action=readAll"><p>Voitures</p></a></li>
                    <li><a href="frontController.php?controller=utilisateur&action=readAll"><p>Utilisateurs</p></a></li>
                    <li><a href="frontController.php?controller=trajet&action=readAll"><p>Trajets</p></a></li>
                    <li><a href="frontController.php?action=formulairePreference"><img src="../assets/svg/heart.svg" alt="heart"></a></li>
                </ul>
            </nav>
			<?php foreach (FlashMessage::read() as $message) echo "<div class=\"alert alert-$message->type\">$message->message</div>\n"?>
		</header>
        <main>
            <?php require __DIR__ . "/{$cheminVueBody}"?>
        </main>
        <footer>
            <p>Site de covoiturage de moi-même</p>
        </footer>
    </body>
</html>