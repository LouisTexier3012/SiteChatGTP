<?php
/* @var String $pagetitle
 * @var String $cheminVueBody
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $pagetitle?></title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <header>
        <nav>
            <ul>
                <li><a href="frontController.php?action=readAll"><p>Voitures</p></a></li>
                <li><a href="frontController.php?action=readAll&controller=utilisateur"><p>Utilisateurs</p></a></li>
                <li><a href="frontController.php?action=readAll&controller=trajet"><p>Trajets</p></a></li>
                <li><a href="frontController.php?action=create"><p>Créer une voiture</p></a></li>
            </ul>
        </nav>
        </header>
        <main>
            <?php require __DIR__ . "/{$cheminVueBody}"?>
        </main>
        <footer>
            <p>Site de covoiturage de moi-même</p>
        </footer>
    </body>
</html>