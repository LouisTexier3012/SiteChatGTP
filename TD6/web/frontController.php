<?php
use App\Covoiturage\Controller\ControllerVoiture;

require_once __DIR__ . '/../src/Lib/Psr4AutoloaderClass.php';

$loader = new App\Covoiturage\Lib\Psr4AutoloaderClass(); // instantiate the loader
$loader->addNamespace('App\Covoiturage', __DIR__ . '/../src'); // register the base directories for the namespace prefix
$loader->register(); // register the autoloader

// On recupère l'action passée dans l'URL
if (!isset($_GET["action"])) $action = "readAll";
else                         $action = $_GET["action"];

$isMethod = in_array($action, get_class_methods("App\Covoiturage\Controller\ControllerVoiture"));
if ($isMethod) ControllerVoiture::$action(); // Appel de la méthode statique $action de ControllerVoiture
else           ControllerVoiture::error("L'action n'existe pas");
?>