<?php
require_once __DIR__ . '../controller/ControllerVoiture.php';
// On recupère l'action passée dans l'URL
$action = $_GET["action"];
// Appel de la méthode statique $action de ControllerVoiture
ControllerVoiture::$action();
?>
