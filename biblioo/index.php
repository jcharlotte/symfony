<?php 

require_once "autoload.php";

if( $_GET ){

    $ctrl = $_GET["c"];
    $methode = $_GET["m"];

    $classController = "Controller\\" . ucfirst($ctrl) ."controller";
    $controller = new $classController;
    $controller->$methode();
}
else{
    $lc = new Controller\LivreController;
    $lc->liste();
}
