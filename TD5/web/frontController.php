<?php
use App\Covoiturage\Controller\ControllerVoiture;

require_once __DIR__ . '/../src/Lib/Psr4AutoloaderClass.php';
// instantiate the loader
$loader = new App\Covoiturage\Lib\Psr4AutoloaderClass();
// register the base directories for the namespace prefix
$loader->addNamespace('App\Covoiturage', __DIR__ . '/../src');
// register the autoloader
$loader->register();

// On recupère l'action passée dans l'URL
$action = $_GET["action"];

// Appel de la méthode statique $action de ControllerVoiture
ControllerVoiture::$action();
?>