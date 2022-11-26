<?php

use App\Covoiturage\Controller\GenericController;
use App\Covoiturage\Lib\PreferenceController;
use App\Covoiturage\Controller\ControllerUtilisateur;

require_once __DIR__ . '/../src/Lib/Psr4AutoloaderClass.php';

$loader = new App\Covoiturage\Lib\Psr4AutoloaderClass(); // instantiate the loader
$loader->addNamespace('App\Covoiturage', __DIR__ . '/../src'); // register the base directories for the namespace prefix
$loader->register(); // register the autoloader

if (isset($_GET["action"])) $action = $_GET["action"];
else						$action = "readAll";

if      (isset($_GET["controller"]))      $controllerClassName = "App\Covoiturage\Controller\Controller" . ucfirst($_GET['controller']);
elseif  (PreferenceController::existe())  $controllerClassName = "App\Covoiturage\Controller\Controller" . PreferenceController::lire();
else                                      $controllerClassName = "App\Covoiturage\Controller\ControllerVoiture";

if (class_exists($controllerClassName)) {

	if (in_array($action, get_class_methods($controllerClassName))) (new $controllerClassName)->$action();
	else (new GenericController)->error("Cette action n'existe pas pour ce controlleur");
}
else (new GenericController)->error("Ce controlleur n'existe pas");
?>