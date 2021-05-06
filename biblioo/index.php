<?php 

require_once "autoload.php";

if ($_GET) {
    $ctrl = $_GET["c"];
    $methode = $_GET["m"];
    $id = $_GET["i"] ?? null;

    $classController = "Controller\\" . ucfirst($ctrl) . "Controller";
    $controller = new $classController;
    $controller->$methode($id);
} else {
    $lc = new Controller\LivreController;
    $lc->liste();
}
